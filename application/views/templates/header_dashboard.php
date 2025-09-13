<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title : 'Dashboard' ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <div class="flex min-h-screen">

    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn" class="md:hidden fixed top-4 left-4 bg-gray-800 text-white p-2 rounded">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="w-82 md:w-1/4 lg:w-1/6 h-screen sticky top-0 bg-gray-800 text-white flex-col md:flex fixed md:relative transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-40">
      <h2 class="text-center py-4 font-bold text-xl border-b border-gray-700">Menu</h2>
      <nav class="flex-1">
        <a href="<?= base_url('home') ?>" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
        <a href="<?= base_url('mahasiswa') ?>" class="block px-4 py-2 hover:bg-gray-700">Mahasiswa</a>
        <a href="<?= base_url('kriteria') ?>" class="block px-4 py-2 hover:bg-gray-700">Kriteria</a>
        <a href="<?= base_url('jurusan') ?>" class="block px-4 py-2 hover:bg-gray-700">Jurusan</a>
        <a href="<?= base_url('mahasiswa/alternatif') ?>" class="block px-4 py-2 hover:bg-gray-700">Alternatif</a>
        <a href="<?= base_url('bobot') ?>" class="block px-4 py-2 hover:bg-gray-700">Bobot Nilai</a>
        <a href="<?= base_url('home/profile') ?>" class="block px-4 py-2 hover:bg-gray-700">Profile</a>
        <a href="<?= base_url('home/settings') ?>" class="block px-4 py-2 hover:bg-gray-700">Settings</a>
      </nav>
      <a href="<?= base_url('login/logout') ?>" class="block px-4 py-2 bg-red-600 hover:bg-red-700 text-center">
        Logout
      </a>
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
    <div class="md:flex-1 p-6 w-full md:w-3/4 lg:w-5/6">