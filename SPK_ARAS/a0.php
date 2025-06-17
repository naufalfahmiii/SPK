<?php
include 'koneksi.php';

$kriteria = ['processor', 'ram', 'tipe_storage', 'kapasitas_storage', 'harga'];
$bobotData = $conn->query("SELECT * FROM bobot");

$bobot = [];
$sifat = [];
while ($b = $bobotData->fetch_assoc()) {
    $bobot[$b['kriteria']] = $b['nilai'];
    $sifat[$b['kriteria']] = strtolower($b['sifat']);
}

$data = $conn->query("SELECT * FROM alternatif");
$alternatif = [];
while ($row = $data->fetch_assoc()) $alternatif[] = $row;

$A0 = [];
foreach ($kriteria as $k) {
    $values = array_column($alternatif, $k);
    if (count($values) > 0) {
        $A0[$k] = ($sifat[$k] == 'cost') ? min($values) : max($values);
    } else {
        $A0[$k] = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Nilai Optimal A0</title>
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
    <h2>Nilai Optimal (A<sub>0</sub>)</h2>
    <table>
      <thead>
        <tr>
          <?php foreach ($kriteria as $k) echo "<th>" . ucfirst($k) . "</th>"; ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php foreach ($kriteria as $k) echo "<td>" . $A0[$k] . "</td>"; ?>
        </tr>
      </tbody>
    </table>

    <form action="normalisasi.php" method="post" style="margin-top: 20px;">
      <?php foreach ($A0 as $k => $v) echo "<input type='hidden' name='A0[$k]' value='$v'>"; ?>
      <button type="submit">Lanjut ke Normalisasi</button>
    </form>
  </div>
</div>
</body>
</html>
