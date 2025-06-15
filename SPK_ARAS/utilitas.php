<?php
include 'koneksi.php';

$terbobot = json_decode($_POST['terbobot'], true);
$a0 = json_decode($_POST['a0'], true);

$s0 = isset($a0['total']) && $a0['total'] != 0 ? $a0['total'] : 1;

$preferensi = [];
foreach ($terbobot as $row) {
    // Skip A0 dari ranking
    if ($row['nama'] == 'A0') continue;

    $preferensi[] = [
        'nama' => $row['nama'],
        'nilai' => $row['total'],
        'pref' => $row['total'] / $s0
    ];
}
usort($preferensi, fn($a, $b) => $b['pref'] <=> $a['pref']);

// Simpan ke DB
$conn->query("DELETE FROM hasil_akhir");
$rank = 1;
foreach ($preferensi as $p) {
  if ($p['nama'] == 'A0') continue; // Lewati A0
    $nama = $conn->real_escape_string($p['nama']);
    $skor = $p['nilai'];
    $pref = $p['pref'];
    $conn->query("INSERT INTO hasil_akhir (nama, skor, preferensi, ranking)
                  VALUES ('$nama', $skor, $pref, $rank)");
    $rank++;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hasil Preferensi dan Ranking</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="sidebar">
  <h2>Menu ARAS</h2>
  <a href="beranda.php">🏠 Beranda</a>
  <a href="tampildata.php">📊 Data Awal</a>
  <a href="hasil.php">📄 Lihat Hasil</a>
</div>

<div class="main-content">
  <div class="container">
    <h2>Hasil Nilai Preferensi dan Ranking</h2>
    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Skor (Si)</th>
          <th>Preferensi (Ki)</th>
          <th>Ranking</th>
        </tr>
      </thead>
      <tbody>
        <?php $rank = 1; foreach ($preferensi as $row): ?>
          <tr>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= round($row['nilai'], 4) ?></td>
            <td><?= round($row['pref'], 4) ?></td>
            <td><?= $rank++ ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
