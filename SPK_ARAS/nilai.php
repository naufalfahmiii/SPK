<?php
include 'includes/koneksi.php';
include 'header.php';

// Ambil nama kriteria, bobot, dan sifat dari database
$kriteria = [];
$bobot = [];
$sifat = [];
$krData = $conn->query("SELECT * FROM kriteria");
while ($kr = $krData->fetch_assoc()) {
  $kriteria[] = $kr['nama_kriteria'];
  $bobot[$kr['nama_kriteria']] = $kr['bobot_kriteria'];
  $sifat[$kr['nama_kriteria']] = strtolower($kr['tipe_kriteria']);
}

// Ambil data alternatif dan nama laptop
$data = $conn->query("SELECT a.*, dm.nama_laptop FROM alternatif a JOIN data_mentah dm ON a.id_data = dm.id_data");
$alternatif = [];
while ($row = $data->fetch_assoc()) $alternatif[] = $row;

// Hitung A0
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
    $sum += ($sifat[$k] == 'cost') ? (1 / $alt[$k]) : $alt[$k];
  }
  $total[$k] = $sum;
}

// Normalisasi alternatif
$normal = [];
foreach ($alternatif as $alt) {
  $row = ['nama' => $alt['nama_laptop']];
  foreach ($kriteria as $k) {
    $row[$k] = ($sifat[$k] == 'cost') ? (1 / $alt[$k]) / $total[$k] : $alt[$k] / $total[$k];
  }
  $normal[] = $row;
}

// Normalisasi A0
$a0_norm = [];
foreach ($kriteria as $k) {
  $a0_norm[$k] = ($sifat[$k] == 'cost') ? (1 / $A0[$k]) / $total[$k] : $A0[$k] / $total[$k];
}

// Normalisasi terbobot
$terbobot = [];
foreach ($normal as $row) {
  $temp = ['nama' => $row['nama'], 'total' => 0];
  foreach ($kriteria as $k) {
    $temp[$k] = $row[$k] * $bobot[$k];
    $temp['total'] += $temp[$k];
  }
  $terbobot[] = $temp;
}

$a0_terbobot = ['nama' => 'A0', 'total' => 0];
foreach ($kriteria as $k) {
  $a0_terbobot[$k] = $a0_norm[$k] * $bobot[$k];
  $a0_terbobot['total'] += $a0_terbobot[$k];
}

// Preferensi dan ranking
$s0 = $a0_terbobot['total'] ?: 1;
$preferensi = [];
foreach ($terbobot as $row) {
  $preferensi[] = [
    'nama' => $row['nama'],
    'skor' => $row['total'],
    'preferensi' => $row['total'] / $s0
  ];
}
usort($preferensi, fn($a, $b) => $b['preferensi'] <=> $a['preferensi']);

// Simpan hasil
$conn->query("DELETE FROM hasil_akhir");
$rank = 1;
foreach ($preferensi as $p) {
  $nama = $conn->real_escape_string($p['nama']);
  $skor = $p['skor'];
  $pref = $p['preferensi'];
  $conn->query("INSERT INTO hasil_akhir (nama, skor, preferensi, ranking) VALUES ('$nama', $skor, $pref, $rank)");
  $rank++;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Perhitungan ARAS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function showTab(tab) {
      document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
      document.getElementById(tab).classList.remove('hidden');
    }
  </script>
</head>
<body class="bg-gray-100 min-h-screen p-4">


    <div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-center mb-6">Perhitungan ARAS</h1>

    <div class="flex border-b border-gray-300 mb-4">
        <button id="tab-a0-btn" class="tab-btn py-2 px-4 font-semibold text-blue-600 border-b-2 border-blue-600" onclick="showTab('a0')">A0 & Normalisasi A0</button>
        <button id="tab-normalisasi-btn" class="tab-btn py-2 px-4 font-semibold text-gray-600 hover:text-blue-600" onclick="showTab('normalisasi')">Normalisasi</button>
        <button id="tab-terbobot-btn" class="tab-btn py-2 px-4 font-semibold text-gray-600 hover:text-blue-600" onclick="showTab('terbobot')">Terbobot</button>
        <button id="tab-hasil-btn" class="tab-btn py-2 px-4 font-semibold text-gray-600 hover:text-blue-600" onclick="showTab('hasil')">Preferensi</button>
    </div>

    <!-- TAB A0 -->
    <div id="tab-a0" class="tab-content">
        <h2 class="text-lg font-semibold mb-2">Nilai A0</h2>
        <table class="table-auto w-full mb-4">
        <thead><tr><?php foreach ($kriteria as $k) echo "<th class='border px-2 py-1'>".ucfirst($k)."</th>"; ?></tr></thead>
        <tbody><tr><?php foreach ($kriteria as $k) echo "<td class='border px-2 py-1'>{$A0[$k]}</td>"; ?></tr></tbody>
        </table>

        <h2 class="text-lg font-semibold mb-2">Normalisasi A0</h2>
        <table class="table-auto w-full">
        <thead><tr><?php foreach ($kriteria as $k) echo "<th class='border px-2 py-1'>".ucfirst($k)."</th>"; ?></tr></thead>
        <tbody><tr><?php foreach ($kriteria as $k) echo "<td class='border px-2 py-1'>".round($a0_norm[$k], 4)."</td>"; ?></tr></tbody>
        </table>
    </div>

    <!-- TAB Normalisasi -->
    <div id="tab-normalisasi" class="tab-content hidden">
        <h2 class="text-lg font-semibold mb-2">Normalisasi Alternatif</h2>
        <table class="table-auto w-full">
        <thead><tr><th class="border px-2 py-1">Nama</th><?php foreach ($kriteria as $k) echo "<th class='border px-2 py-1'>".ucfirst($k)."</th>"; ?></tr></thead>
        <tbody>
            <?php foreach ($normal as $row): ?>
            <tr>
            <td class="border px-2 py-1"><?= $row['nama'] ?></td>
            <?php foreach ($kriteria as $k): ?>
                <td class="border px-2 py-1"><?= round($row[$k], 4) ?></td>
            <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>

    <!-- TAB Terbobot -->
    <div id="tab-terbobot" class="tab-content hidden">
        <h2 class="text-lg font-semibold mb-2">Normalisasi Terbobot</h2>
        <table class="table-auto w-full">
        <thead><tr><th class="border px-2 py-1">Nama</th><?php foreach ($kriteria as $k) echo "<th class='border px-2 py-1'>".ucfirst($k)."</th>"; ?><th class="border px-2 py-1">Total</th></tr></thead>
        <tbody>
            <?php foreach ($terbobot as $row): ?>
            <tr>
            <td class="border px-2 py-1"><?= $row['nama'] ?></td>
            <?php foreach ($kriteria as $k): ?>
                <td class="border px-2 py-1"><?= round($row[$k], 4) ?></td>
            <?php endforeach; ?>
            <td class="border px-2 py-1"><?= round($row['total'], 4) ?></td>
            </tr>
            <?php endforeach; ?>
            <tr class="bg-gray-200 font-semibold">
            <td class="border px-2 py-1">A0</td>
            <?php foreach ($kriteria as $k): ?>
                <td class="border px-2 py-1"><?= round($a0_terbobot[$k], 4) ?></td>
            <?php endforeach; ?>
            <td class="border px-2 py-1"><?= round($a0_terbobot['total'], 4) ?></td>
            </tr>
        </tbody>
        </table>
    </div>

    <!-- TAB Preferensi -->
    <div id="tab-hasil" class="tab-content hidden">
        <h2 class="text-lg font-semibold mb-2">Preferensi & Ranking</h2>
        <table class="table-auto w-full">
        <thead><tr><th class="border px-2 py-1">Nama</th><th class="border px-2 py-1">Skor</th><th class="border px-2 py-1">Preferensi</th><th class="border px-2 py-1">Ranking</th></tr></thead>
        <tbody>
            <?php $rank = 1; foreach ($preferensi as $row): ?>
            <tr>
            <td class="border px-2 py-1"><?= $row['nama'] ?></td>
            <td class="border px-2 py-1"><?= round($row['skor'], 4) ?></td>
            <td class="border px-2 py-1"><?= round($row['preferensi'], 4) ?></td>
            <td class="border px-2 py-1"><?= $rank++ ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    </div>

    <script>
    function showTab(tabId) {
        const tabs = ['a0', 'normalisasi', 'terbobot', 'hasil'];

        // Sembunyikan semua tab & reset tombol
        tabs.forEach(id => {
        document.getElementById('tab-' + id).classList.add('hidden');
        const btn = document.getElementById('tab-' + id + '-btn');
        btn.classList.remove('text-blue-600', 'border-blue-600');
        btn.classList.add('text-gray-600');
        });

        // Tampilkan tab terpilih & beri style aktif
        document.getElementById('tab-' + tabId).classList.remove('hidden');
        const activeBtn = document.getElementById('tab-' + tabId + '-btn');
        activeBtn.classList.add('text-blue-600', 'border-blue-600');
        activeBtn.classList.remove('text-gray-600');
    }
    </script>

    <style>
    .tab-content {
        transition: opacity 0.3s ease;
    }
    </style>

</body>
</html>
