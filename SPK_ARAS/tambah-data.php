<?php
include 'includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_laptop     = $_POST['nama_laptop'];
    $processor_text  = $_POST['processor'];
    $ram_text        = $_POST['ram'];
    $tipe_text       = $_POST['tipe_storage'];
    $kapasitas_text  = $_POST['kapasitas_storage'];
    $harga_input     = $_POST['harga'];

    // Skor sesuai tabel
    $skorProcessor = [
        'Intel Pentium' => 1,
        'Intel Celeron' => 2,
        'AMD Ryzen 3 / Intel Core i3' => 3,
        'AMD Ryzen 5 / Intel Core i5' => 4,
        'Intel Core i7' => 5
    ];

    $skorRAM = [
        '< 4GB' => 1,
        '4GB' => 2,
        '6GB' => 3,
        '8GB' => 4,
        '12GB' => 5
    ];

    $skorTipe = [
        'HDD' => 4,
        'SSD' => 5
    ];

    $skorKapasitas = [
        '256GB' => 3,
        '512GB' => 4,
        '1TB' => 5
    ];

    $harga_input = $_POST['harga']; // misalnya "Rp8.409.000"
    $harga_tersimpan = $harga_input; // untuk disimpan di data_mentah

    // Ambil angka saja dari input untuk skor (hilangkan Rp dan titik)
    $harga_numeric = intval(preg_replace('/[^\d]/', '', $harga_input));

    function skorHarga($harga) {
        if ($harga < 4000000) return 1;
        if ($harga <= 5000000) return 2;
        if ($harga <= 7000000) return 3;
        if ($harga <= 10000000) return 4;
        return 5;
    }

    $skor_harga = skorHarga($harga_numeric);


    // Insert ke data_mentah
    $stmt = $conn->prepare("INSERT INTO data_mentah (nama_laptop, processor, ram, tipe_storage, kapasitas_storage, harga)
    VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nama, $processor, $ram, $tipe_storage, $kapasitas, $harga_tersimpan);
    $stmt->execute();
    $id_data = $stmt->insert_id;

    // Nama alternatif otomatis
    $result = $conn->query("SELECT MAX(id_alternatif) AS max_id FROM alternatif");
    $row = $result->fetch_assoc();
    $nextId = $row['max_id'] + 1;
    $nama_alternatif = 'A' . $nextId;

    // Insert ke tabel alternatif
    $stmt2 = $conn->prepare("INSERT INTO alternatif (id_data, nama_alternatif, processor, ram, tipe_storage, kapasitas_storage, harga) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt2->bind_param(
        "isiiiii",
        $id_data,
        $nama_alternatif,
        $skorProcessor[$processor_text],
        $skorRAM[$ram_text],
        $skorTipe[$tipe_text],
        $skorKapasitas[$kapasitas_text],
        $skor_harga
    );
    $stmt2->execute();

    include 'proses_aras.php';

    header("Location: alternatif.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Alternatif</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
  <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Tambah Data Alternatif</h2>
    <form method="POST">
      <div class="mb-4">
        <label class="block font-semibold mb-1">Nama Laptop</label>
        <input type="text" name="nama_laptop" required class="w-full border border-gray-300 p-2 rounded" placeholder="Masukkan nama laptop">
      </div>

      <div class="mb-4">
        <label class="block font-semibold mb-1">Jenis Processor</label>
        <select name="processor" class="w-full border p-2 rounded" required>
          <option value="">Pilih Processor</option>
          <option>Intel Pentium</option>
          <option>Intel Celeron</option>
          <option>AMD Ryzen 3 / Intel Core i3</option>
          <option>AMD Ryzen 5 / Intel Core i5</option>
          <option>Intel Core i7</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block font-semibold mb-1">Kapasitas RAM</label>
        <select name="ram" class="w-full border p-2 rounded" required>
          <option value="">Pilih RAM</option>
          <option>&lt; 4GB</option>
          <option>4GB</option>
          <option>6GB</option>
          <option>8GB</option>
          <option>12GB</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block font-semibold mb-1">Tipe Penyimpanan</label>
        <select name="tipe_storage" class="w-full border p-2 rounded" required>
          <option value="">Pilih Tipe</option>
          <option>HDD</option>
          <option>SSD</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block font-semibold mb-1">Kapasitas Penyimpanan</label>
        <select name="kapasitas_storage" class="w-full border p-2 rounded" required>
          <option value="">Pilih Kapasitas</option>
          <option>256GB</option>
          <option>512GB</option>
          <option>1TB</option>
        </select>
      </div>

      <div class="mb-6">
        <label class="block font-semibold mb-1">Harga (Rp)</label>
        <input type="text" name="harga" required class="w-full border border-gray-300 p-2 rounded" placeholder="Contoh: 8490000">
      </div>

      <div class="flex justify-between">
        <a href="alternatif.php" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">← Kembali</a>
        <div>
          <button type="reset" class="bg-red-500 text-white px-4 py-2 rounded mr-2 hover:bg-red-600">Cancel</button>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Confirm</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
