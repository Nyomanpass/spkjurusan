<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title : 'Dashboard' ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
  <div class="flex min-h-screen justify-end">
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn" class="md:hidden fixed top-4 right-4 bg-gray-800 text-white p-2 rounded">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
    <!-- Sidebar -->
    <div id="sidebar" class="w-72 md:w-1/4 lg:w-1/5 h-screen fixed top-0 left-0 bg-gray-800 text-white flex-col md:flex transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-40 shadow-xl">
      <div class="text-center py-6 border-b border-gray-700">
        <img src="<?= base_url('assets/logo.jpg') ?>" alt="Logo" class="mx-auto h-20 rounded-full shadow-md">
      </div>


     <nav class="flex-1 mt-4 space-y-1 px-2">
      <a href="<?= base_url('home') ?>"
        class="flex items-center px-4 py-3 rounded-lg transition <?= uri_string() == 'home' ? 'bg-gray-700' : 'hover:bg-gray-700' ?>">
        <i class="fas fa-home w-5 mr-3"></i> Dashboard
      </a>

      <a href="<?= base_url('mahasiswa') ?>"
        class="flex items-center px-4 py-3 rounded-lg transition <?= uri_string() == 'mahasiswa' ? 'bg-gray-700' : 'hover:bg-gray-700' ?>">
        <i class="fas fa-user-graduate w-5 mr-3"></i> Siswa
      </a>

      <a href="<?= base_url('kriteria') ?>"
        class="flex items-center px-4 py-3 rounded-lg transition <?= uri_string() == 'kriteria' ? 'bg-gray-700' : 'hover:bg-gray-700' ?>">
        <i class="fas fa-list-check w-5 mr-3"></i> Kriteria
      </a>

      <a href="<?= base_url('jurusan') ?>"
        class="flex items-center px-4 py-3 rounded-lg transition <?= uri_string() == 'jurusan' ? 'bg-gray-700' : 'hover:bg-gray-700' ?>">
        <i class="fas fa-university w-5 mr-3"></i> Jurusan
      </a>

      <a href="<?= base_url('mahasiswa/alternatif') ?>"
        class="flex items-center px-4 py-3 rounded-lg transition <?= uri_string() == 'mahasiswa/alternatif' ? 'bg-gray-700' : 'hover:bg-gray-700' ?>">
        <i class="fas fa-random w-5 mr-3"></i> Alternatif
      </a>

      <a href="<?= base_url('bobot') ?>"
        class="flex items-center px-4 py-3 rounded-lg transition <?= uri_string() == 'bobot' ? 'bg-gray-700' : 'hover:bg-gray-700' ?>">
        <i class="fas fa-balance-scale w-5 mr-3"></i> Bobot Nilai
      </a>

      <a href="<?= base_url('rekomendasi') ?>"
        class="flex items-center px-4 py-3 rounded-lg transition <?= uri_string() == 'rekomendasi' ? 'bg-gray-700' : 'hover:bg-gray-700' ?>">
        <i class="fas fa-lightbulb w-5 mr-3"></i> Rekomendasi
      </a>

      <a href="<?= base_url('setting') ?>"
        class="flex items-center px-4 py-3 rounded-lg transition <?= uri_string() == 'setting' ? 'bg-gray-700' : 'hover:bg-gray-700' ?>">
        <i class="fas fa-cog w-5 mr-3"></i> Setting
      </a>
    </nav>


      <!-- Logout -->


    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        mobileMenuBtn.addEventListener('click', function() {
          sidebar.classList.toggle('-translate-x-full');
          overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', function() {
          sidebar.classList.add('-translate-x-full');
          overlay.classList.add('hidden');
        });
      });
    </script>

    <!-- Content -->
    <div class="p-6 w-full md:w-3/4 lg:w-4/5">