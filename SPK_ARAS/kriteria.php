<?php
include 'includes/koneksi.php';
include 'header.php';

// Ambil data kriteria
$query = "SELECT * FROM kriteria ORDER BY id_kriteria ASC";
$result = mysqli_query($conn, $query);
?>

<div class="max-w-5xl mx-auto p-6">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Data Kriteria</h1>
  </div>

  <div class="overflow-x-auto bg-white rounded shadow">
    <table class="min-w-full text-sm text-left text-gray-700">
      <thead class="bg-gray-100 text-gray-800 font-semibold uppercase">
        <tr>
          <th class="px-6 py-3">No</th>
          <th class="px-6 py-3">Nama Kriteria</th>
          <th class="px-6 py-3">Tipe</th>
          <th class="px-6 py-3">Bobot</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr class="border-t hover:bg-gray-50">
          <td class="px-6 py-4"><?= $no++ ?></td>
          <td class="px-6 py-4"><?= htmlspecialchars($row['nama_kriteria']) ?></td>
          <td class="px-6 py-4 capitalize"><?= $row['tipe_kriteria'] ?></td>
          <td class="px-6 py-4"><?= $row['bobot_kriteria'] ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
