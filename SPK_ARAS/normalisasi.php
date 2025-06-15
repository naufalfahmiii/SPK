<?php
include 'koneksi.php';

$A0 = $_POST['A0'];
$kriteria = ['processor', 'ram', 'strg', 'layar', 'harga'];
$data = $conn->query("SELECT * FROM alternatif");
$alternatif = [];
while ($row = $data->fetch_assoc()) $alternatif[] = $row;

$bobotData = $conn->query("SELECT * FROM bobot");
$sifat = [];
foreach ($bobotData as $b) {
    $sifat[$b['kriteria']] = strtolower($b['sifat']);
}

// Hitung total untuk setiap kriteria
$total = [];
foreach ($kriteria as $k) {
    $sum = 0;
    if ($sifat[$k] == 'cost') {
        foreach ($alternatif as $alt) {
            if ($alt[$k] > 0) {
                $sum += 1 / $alt[$k];
            }
        }
    } else {
        foreach ($alternatif as $alt) {
            $sum += $alt[$k];
        }
    }
    $total[$k] = $sum;
}

// Normalisasi semua alternatif
$normal = [];
foreach ($alternatif as $alt) {
    $baris = ['nama' => $alt['nama']];
    foreach ($kriteria as $k) {
        if ($sifat[$k] == 'cost') {
            $baris[$k] = (1 / $alt[$k]) / $total[$k];
        } else {
            $baris[$k] = $alt[$k] / $total[$k];
        }
    }
    $normal[] = $baris;
}

// Normalisasi A0
$a0_norm = [];
foreach ($kriteria as $k) {
    if ($sifat[$k] == 'cost') {
        $a0_norm[$k] = (1 / $A0[$k]) / $total[$k];
    } else {
        $a0_norm[$k] = $A0[$k] / $total[$k];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Normalisasi - ARAS</title>
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
    <h2>Hasil Normalisasi Alternatif</h2>
    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <?php foreach ($kriteria as $k) echo "<th>" . ucfirst($k) . "</th>"; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($normal as $row): ?>
          <tr>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <?php foreach ($kriteria as $k): ?>
              <td><?= round($row[$k], 4) ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <h2 style="margin-top: 40px;">Normalisasi A<sub>0</sub></h2>
    <table>
      <thead>
        <tr><?php foreach ($kriteria as $k) echo "<th>" . ucfirst($k) . "</th>"; ?></tr>
      </thead>
      <tbody>
        <tr><?php foreach ($kriteria as $k) echo "<td>" . round($a0_norm[$k], 4) . "</td>"; ?></tr>
      </tbody>
    </table>

    <form action="terbobot.php" method="post" style="margin-top: 30px;">
      <input type="hidden" name="normal" value='<?= json_encode($normal) ?>'>
      <input type="hidden" name="a0" value='<?= json_encode($a0_norm) ?>'>
      <button type="submit">Lanjut ke Terbobot</button>
    </form>
  </div>
</div>
</body>
</html>
