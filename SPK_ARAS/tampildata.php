<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Awal - Aplikasi ARAS</title>
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
      <h2>Data Alternatif</h2>
      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Processor</th>
              <th>RAM</th>
              <th>Storage</th>
              <th>Layar</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = $conn->query("SELECT * FROM alternatif");
            if ($data->num_rows > 0) {
              $no = 1;
              while ($row = $data->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['processor']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ram']) . "</td>";
                echo "<td>" . htmlspecialchars($row['strg']) . "</td>";
                echo "<td>" . htmlspecialchars($row['layar']) . "</td>";
                echo "<td>" . htmlspecialchars($row['harga']) . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='7'>Data alternatif belum tersedia</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>

      <h2 style="margin-top: 40px;">Bobot Kriteria</h2>
      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>Kriteria</th>
              <th>Sifat</th>
              <th>Bobot</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = $conn->query("SELECT * FROM bobot");
            if ($data->num_rows > 0) {
              $no = 1;
              while ($row = $data->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . htmlspecialchars($row['kriteria']) . "</td>";
                echo "<td>" . htmlspecialchars($row['sifat']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nilai']) . "</td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='4'>Data bobot belum tersedia</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>

      <form action="a0.php" method="post" style="margin-top: 30px;">
        <button type="submit">Lanjut</button>
      </form>
    </div>
  </div>

</body>
</html>
