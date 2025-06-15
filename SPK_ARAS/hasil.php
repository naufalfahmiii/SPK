<?php
include 'koneksi.php';

// Ambil data dari tabel hasil_akhir
$query = "SELECT * FROM hasil_akhir ORDER BY ranking ASC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lihat Hasil Perangkingan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="sidebar">
  <h2>Menu ARAS</h2>
  <a href="beranda.php">🏠 Beranda</a>
  <a href="tampildata.php">📊 Data Awal</a>
  <a href="hasil.php" class="active">📄 Lihat Hasil</a>
</div>

<div class="main-content">
  <div class="container">
    <h2>Hasil Akhir Perangkingan Alternatif</h2>
    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Alternatif</th>
            <th>Skor (Si)</th>
            <th>Preferensi (Ki)</th>
            <th>Ranking</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= round($row['skor'], 4) ?></td>
            <td><?= round($row['preferensi'], 4) ?></td>
            <td><?= $row['ranking'] ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</body>
</html>
