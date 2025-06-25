<?php
include "header.php";
include "includes/koneksi.php";
include 'proses-aras.php';


$queryMentah = mysqli_query($conn, "SELECT * FROM data_mentah");
$queryAlternatif = mysqli_query($conn, " SELECT a.*, dm.nama_laptop 
    FROM alternatif a 
    JOIN data_mentah dm ON a.id_data = dm.id_data");
?>

<div class="max-w-6xl mx-auto mt-10 px-4">
  <!-- Tab Navigation -->
    <div class="flex justify-between items-center border-b pb-2">
        <!-- Kiri: Tombol Tab -->
        <div class="flex space-x-4">
            <button id="tab-btn-mentah" class="py-2 px-4 font-semibold border-b-2 border-blue-500 text-blue-600" onclick="showTab('mentah')">Data Mentah</button>
            <button id="tab-btn-alternatif" class="py-2 px-4 font-semibold text-gray-600 hover:text-blue-600" onclick="showTab('alternatif')">Data Alternatif</button>
        </div>

        <!-- Kanan: Tombol Tambah -->
        <a href="tambah-data.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Data</a>
    </div>


  <!-- Tab Content -->
  <div id="tab-mentah">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-semibold text-gray-800">📄 Data Mentah</h2>
    </div>
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded shadow text-sm">
        <thead class="bg-gray-100 text-left">
          <tr>
            <th class="p-3">No</th>
            <th class="p-3">Nama Laptop</th>
            <th class="p-3">Processor</th>
            <th class="p-3">RAM</th>
            <th class="p-3">Tipe Storage</th>
            <th class="p-3">Kapasitas Storage</th>
            <th class="p-3">Harga</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php $no = 1; while ($row = mysqli_fetch_assoc($queryMentah)) : ?>
          <tr>
            <td class="p-3"><?= $no++ ?></td>
            <td class="p-3"><?= htmlspecialchars($row['nama_laptop']) ?></td>
            <td class="p-3"><?= $row['processor'] ?></td>
            <td class="p-3"><?= $row['ram'] ?></td>
            <td class="p-3"><?= $row['tipe_storage'] ?></td>
            <td class="p-3"><?= $row['kapasitas_storage'] ?></td>
            <td class="p-3"><?= $row['harga'] ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div id="tab-alternatif" class="hidden">
    <div class="flex justify-between items-center mb-4 mt-8">
      <h2 class="text-lg font-semibold text-gray-800">📊 Data Alternatif</h2>
    </div>
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded shadow text-sm">
        <thead class="bg-gray-100 text-left">
          <tr>
            <th class="p-3">Alternatif</th>
            <th class="p-3">Nama Laptop</th>
            <th class="p-3">Processor</th>
            <th class="p-3">RAM</th>
            <th class="p-3">Tipe Storage</th>
            <th class="p-3">Kapasitas</th>
            <th class="p-3">Harga</th>
            <th class="p-3 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php $no = 1; while ($row = mysqli_fetch_assoc($queryAlternatif)) : ?>
          <tr>
            <td class="p-3"><?= htmlspecialchars($row['nama_alternatif']) ?></td>
            <td class="p-3"><?= htmlspecialchars($row['nama_laptop']) ?></td>
            <td class="p-3"><?= $row['processor'] ?></td>
            <td class="p-3"><?= $row['ram'] ?></td>
            <td class="p-3"><?= $row['tipe_storage'] ?></td>
            <td class="p-3"><?= $row['kapasitas_storage'] ?></td>
            <td class="p-3"><?= $row['harga'] ?></td>
            <td class="p-3 text-center space-x-2">
              <a href="hapus-data.php?id=<?= $row['id_data'] ?>" 
                onclick="return confirm('Yakin ingin menghapus data ini?')" 
                class="text-red-600 hover:text-red-800">Hapus</a>

            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
function showTab(tabId) {
  // Sembunyikan semua tab
  document.getElementById("tab-mentah").classList.add("hidden");
  document.getElementById("tab-alternatif").classList.add("hidden");

  // Tampilkan tab aktif
  document.getElementById("tab-" + tabId).classList.remove("hidden");

  // Reset semua tombol tab
  document.getElementById("tab-btn-mentah").classList.remove("border-blue-500", "text-blue-600", "border-b-2");
  document.getElementById("tab-btn-mentah").classList.add("text-gray-600");

  document.getElementById("tab-btn-alternatif").classList.remove("border-blue-500", "text-blue-600", "border-b-2");
  document.getElementById("tab-btn-alternatif").classList.add("text-gray-600");

  // Aktifkan tombol yang diklik
  const activeBtn = document.getElementById("tab-btn-" + tabId);
  activeBtn.classList.add("border-blue-500", "text-blue-600", "border-b-2");
  activeBtn.classList.remove("text-gray-600");
}
</script>
