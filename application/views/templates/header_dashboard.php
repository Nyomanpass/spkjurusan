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
    
    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white flex flex-col">
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

    <!-- Content -->
    <div class="flex-1 p-6">
