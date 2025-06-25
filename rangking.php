<?php
include "header.php";
include "includes/koneksi.php";
include 'proses-aras.php';

// Query gabungan hasil_akhir → alternatif → data_mentah
$query = "SELECT ha.*, a.nama_alternatif, dm.nama_laptop 
FROM hasil_akhir ha
JOIN alternatif a ON ha.id_alternatif = a.id_alternatif
JOIN data_mentah dm ON a.id_data = dm.id_data
ORDER BY ha.ranking ASC
";

$result = mysqli_query($conn, $query);
?>

<div class="max-w-6xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-semibold text-gray-800">📊 Hasil Akhir Perangkingan</h2>
  </div>

  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Alternatif</th>
          <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Nama Laptop</th>
          <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Skor (Si)</th>
          <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Preferensi (Ki)</th>
          <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Ranking</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php 
        $no = 1; 
        while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['nama_alternatif']) ?></td>
          <td class="px-4 py-2 text-sm text-gray-800"><?= htmlspecialchars($row['nama_laptop']) ?></td>
          <td class="px-4 py-2 text-sm text-gray-800"><?= round($row['skor'], 4) ?></td>
          <td class="px-4 py-2 text-sm text-gray-800"><?= round($row['preferensi'], 4) ?></td>
          <td class="px-4 py-2 text-sm font-semibold text-blue-600"><?= $row['ranking'] ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
