<?php
include 'koneksi.php';

$normal = json_decode($_POST['normal'], true);
$a0 = json_decode($_POST['a0'], true);

$kriteria = ['processor', 'ram', 'strg', 'layar', 'harga'];

// bobot dari database
$bobotData = $conn->query("SELECT * FROM bobot");
$bobot = [];
while ($b = $bobotData->fetch_assoc()) {
    $bobot[$b['kriteria']] = $b['nilai'];
}
// Proses alternatif (A1, A2, ..., An)
$terbobot = [];
foreach ($normal as $row) {
    $baris = ['nama' => $row['nama'], 'total' => 0];
    foreach ($kriteria as $k) {
        $baris[$k] = $row[$k] * $bobot[$k];
        $baris['total'] += $baris[$k];
    }
    $terbobot[] = $baris;
}
// Proses A0
$a0_terbobot = ['nama' => 'A0', 'total' => 0];
foreach ($kriteria as $k) {
    $a0_terbobot[$k] = $a0[$k] * $bobot[$k];
    $a0_terbobot['total'] += $a0_terbobot[$k];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Normalisasi Terbobot</title>
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
    <h2>Hasil Normalisasi Terbobot</h2>
    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <?php foreach ($kriteria as $k) echo "<th>" . ucfirst($k) . "</th>"; ?>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($terbobot as $row): ?>
          <tr>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <?php foreach ($kriteria as $k): ?>
              <td><?= round($row[$k], 4) ?></td>
            <?php endforeach; ?>
            <td><?= round($row['total'], 4) ?></td>
          </tr>
        <?php endforeach; ?>

        <!-- Baris A0 -->
        <tr style="font-weight: bold; background-color: #eef;">
          <td><?= $a0_terbobot['nama'] ?></td>
          <?php foreach ($kriteria as $k): ?>
            <td><?= round($a0_terbobot[$k], 4) ?></td>
          <?php endforeach; ?>
          <td><?= round($a0_terbobot['total'], 4) ?></td>
        </tr>
      </tbody>
    </table>
  <form action="utilitas.php" method="post">
    <input type="hidden" name="terbobot" value='<?= json_encode($terbobot) ?>'>
    <input type="hidden" name="a0" value='<?= json_encode($a0_terbobot) ?>'>
    <button type="submit">Lanjut</button>
  </form>

  </div>
</div>
</body>
</html>
