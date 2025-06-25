<?php
include 'includes/koneksi.php';

// Ambil semua kriteria
$kriteriaData = $conn->query("SELECT * FROM kriteria");
$kriteria = [];
$bobot = [];
$sifat = [];

while ($row = $kriteriaData->fetch_assoc()) {
    $nama = strtolower($row['nama_kriteria']); // pastikan lowercase agar konsisten
    $kriteria[] = $nama;
    $bobot[$nama] = $row['bobot_kriteria'];
    $sifat[$nama] = strtolower($row['tipe_kriteria']);
}

// Ambil semua data alternatif + nama_laptop dari data_mentah
$data = $conn->query("
    SELECT a.*, dm.nama_laptop 
    FROM alternatif a
    JOIN data_mentah dm ON a.id_data = dm.id_data
");

$alternatif = [];
while ($row = $data->fetch_assoc()) $alternatif[] = $row;

// Hitung nilai A0
$A0 = [];
foreach ($kriteria as $k) {
    $values = array_column($alternatif, $k);
    $A0[$k] = ($sifat[$k] == 'cost') ? min($values) : max($values);
}

// Hitung total untuk normalisasi
$total = [];
foreach ($kriteria as $k) {
    $sum = 0;
    foreach ($alternatif as $alt) {
        if ($sifat[$k] == 'cost') {
            $sum += 1 / $alt[$k];
        } else {
            $sum += $alt[$k];
        }
    }
    $total[$k] = $sum;
}

// Normalisasi
$normal = [];
foreach ($alternatif as $alt) {
    $baris = [
        'id_alternatif' => $alt['id_alternatif'],
        'nama' => $alt['nama_laptop']
    ];
    foreach ($kriteria as $k) {
        $baris[$k] = ($sifat[$k] == 'cost') ? ((1 / $alt[$k]) / $total[$k]) : ($alt[$k] / $total[$k]);
    }
    $normal[] = $baris;
}

// Normalisasi terbobot
$terbobot = [];
foreach ($normal as $row) {
    $totalSkor = 0;
    foreach ($kriteria as $k) {
        $totalSkor += $row[$k] * $bobot[$k];
    }
    $row['total'] = $totalSkor;
    $terbobot[] = $row;
}

// Hitung S0 (A0 setelah dinormalisasi dan dibobotkan)
$s0 = 0;
foreach ($kriteria as $k) {
    $a0 = ($sifat[$k] == 'cost') ? ((1 / $A0[$k]) / $total[$k]) : ($A0[$k] / $total[$k]);
    $s0 += $a0 * $bobot[$k];
}

// Simpan ke hasil_akhir
$conn->query("DELETE FROM hasil_akhir");

$ranking = [];
foreach ($terbobot as $row) {
    $ranking[] = [
        'id_alternatif' => $row['id_alternatif'],
        'nama' => $row['nama'],
        'skor' => $row['total'],
        'preferensi' => $row['total'] / $s0
    ];
}

// Urutkan preferensi
usort($ranking, fn($a, $b) => $b['preferensi'] <=> $a['preferensi']);

// Masukkan ke DB
$rank = 1;
foreach ($ranking as $r) {
    $id = $r['id_alternatif'];
    $nama = $conn->real_escape_string($r['nama']);
    $skor = $r['skor'];
    $pref = $r['preferensi'];
    $conn->query("INSERT INTO hasil_akhir (id_alternatif, nama, skor, preferensi, ranking)
                  VALUES ($id, '$nama', $skor, $pref, $rank)");
    $rank++;
}
?>
