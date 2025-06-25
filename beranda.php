<?php
include 'header.php';
include 'includes/koneksi.php';
include 'proses-aras.php';

// Ambil data nama_laptop dan preferensi dari hasil_akhir
$sql = "
    SELECT dm.nama_laptop, ha.preferensi
    FROM hasil_akhir ha
    JOIN alternatif a ON ha.id_alternatif = a.id_alternatif
    JOIN data_mentah dm ON a.id_data = dm.id_data
    ORDER BY ha.ranking ASC
";
$result = mysqli_query($conn, $sql);

$labels = [];
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['nama_laptop'];
    $data[] = $row['preferensi'];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Sistem Pendukung Keputusan - Metode ARAS</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <div class="text-center p-6 bg-white shadow mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Sistem Pendukung Keputusan</h1>
    <h2 class="text-xl font-semibold text-gray-600 mt-1">(Metode ARAS - Additive Ratio Assessment)</h2>
    <p class="max-w-3xl mx-auto mt-4 text-gray-700 leading-relaxed">
      Metode ARAS (Additive Ratio Assessment) merupakan salah satu metode pengambilan keputusan multikriteria
      yang digunakan untuk menentukan alternatif terbaik dengan membandingkan total nilai utilitas dari masing-masing
      alternatif terhadap solusi ideal. Setiap alternatif dievaluasi berdasarkan preferensi terhadap beberapa kriteria
      yang relevan.
    </p>
  </div>

  <div class="w-full overflow-x-auto px-6">
    <div class="bg-white p-4 rounded shadow">
      <h3 class="text-lg font-semibold mb-4 text-gray-700 text-center">Grafik Peringkat Alternatif</h3>
      <div class="w-full max-w-7xl mx-auto h-[500px]">
        <canvas id="rankingChart" class="w-full h-full"></canvas>
      </div>
    </div>
  </div>

  <script>
    const ctx = document.getElementById('rankingChart').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
          label: 'Nilai Preferensi',
          data: <?= json_encode($data) ?>,
          backgroundColor: 'rgba(59, 130, 246, 0.6)', // Tailwind blue-500
          borderColor: 'rgba(37, 99, 235, 1)',         // Tailwind blue-600
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
            position: 'top'
          },
          title: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Nilai Preferensi'
            }
          },
          x: {
            ticks: {
              maxRotation: 45,
              minRotation: 45
            },
            title: {
              display: true,
              text: 'Alternatif (Nama Laptop)'
            }
          }
        }
      }
    });
  </script>

</body>
</html>
