<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beranda - Aplikasi SPK ARAS</title>
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
    <h1>Selamat Datang di Aplikasi SPK - Metode ARAS</h1>
    <p>
      Aplikasi ini digunakan untuk membantu menentukan alternatif terbaik berdasarkan beberapa kriteria menggunakan metode <strong>ARAS</strong> (Additive Ratio Assessment).
    </p>
    <h3>Fitur Aplikasi:</h3>
    <ul class="intro-list">
      <li>✏️ Menambah dan mengelola data <strong>Alternatif</strong></li>
      <li>⚖️ Mengatur bobot dan sifat <strong>kriteria</strong></li>
      <li>⚙️ Melakukan proses perhitungan <strong>normalisasi, terbobot, dan preferensi</strong></li>
      <li>📈 Menampilkan hasil <strong>ranking</strong> alternatif terbaik</li>
    </ul>
    <p>Silakan pilih menu di sidebar untuk mulai menggunakan aplikasi.</p>
  </div>
</div>

</body>
</html>
