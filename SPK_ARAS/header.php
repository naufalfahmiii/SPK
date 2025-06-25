<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ARAS</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-gray-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <!-- Logo -->
      <div class="flex-shrink-0">
        <a href="index.php" class="text-white font-bold text-xl">ARAS</a>
      </div>

      <!-- Toggle button for mobile -->
      <div class="md:hidden">
        <button type="button" class="text-gray-300 hover:text-white focus:outline-none" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden md:flex space-x-4">
        <a href="beranda.php" class="text-white hover:text-gray-300">Home</a>
        <a href="nilai.php" class="text-white hover:text-gray-300">Pehitungan</a>
        <a href="kriteria.php" class="text-white hover:text-gray-300">Kriteria</a>
        <a href="alternatif.php" class="text-white hover:text-gray-300">Alternatif</a>
        <a href="rangking.php" class="text-white hover:text-gray-300">Rangking</a>
      </div>
    </div>
  </div>
</nav>