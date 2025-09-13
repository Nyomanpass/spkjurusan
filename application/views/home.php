<div class="p-6 min-h-screen bg-gray-50">
  <h1 class="text-3xl font-bold mb-6 text-gray-800">Dashboard Sistem Pendukung Keputusan</h1>

  <!-- Statistik Cards -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="shadow-lg rounded-lg p-6">
      <div class="flex items-center">
        <div class="flex-1">
          <h2 class="text-lg font-semibold mb-2">Total Mahasiswa</h2>
          <p class="text-3xl font-bold text-blue-600"><?= isset($total_mahasiswa) ? $total_mahasiswa : 0 ?></p>
        </div>
        <div class="text-4xl opacity-80">
          👨‍🎓
        </div>
      </div>
    </div>

    <div class="bg-white border border-gray-200 shadow-lg rounded-lg p-6">
      <div class="flex items-center">
        <div class="flex-1">
          <h2 class="text-lg font-semibold mb-2 text-gray-700">Total Jurusan</h2>
          <p class="text-3xl font-bold text-blue-600"><?= isset($total_jurusan) ? $total_jurusan : 0 ?></p>
        </div>
        <div class="text-4xl opacity-60 text-gray-500">
          🏫
        </div>
      </div>
    </div>

    <div class="shadow-lg rounded-lg p-6">
      <div class="flex items-center">
        <div class="flex-1">
          <h2 class="text-lg font-semibold mb-2">Total Kriteria</h2>
          <p class="text-3xl font-bold text-blue-600"><?= isset($total_kriteria) ? $total_kriteria : 0 ?></p>
        </div>
        <div class="text-4xl opacity-80">
          📊
        </div>
      </div>
    </div>

    <div class="bg-white border border-gray-200 shadow-lg rounded-lg p-6">
      <div class="flex items-center">
        <div class="flex-1">
          <h2 class="text-lg font-semibold mb-2 text-gray-700">Total Bobot</h2>
          <p class="text-3xl font-bold text-blue-600"><?= isset($total_bobot) ? $total_bobot : 0 ?></p>
        </div>
        <div class="text-4xl opacity-60 text-gray-500">
          ⚖️
        </div>
      </div>
    </div>
  </div>

  <!-- Informasi Detail -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Daftar Jurusan -->
    <div class="bg-white shadow-lg rounded-lg p-6">
      <h3 class="text-xl font-semibold mb-4 text-gray-800">Daftar Jurusan</h3>
      <?php if (isset($jurusan_list) && !empty($jurusan_list)): ?>
        <div class="space-y-2">
          <?php foreach ($jurusan_list as $index => $jurusan): ?>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
              <span class="font-medium text-gray-700"><?= htmlspecialchars($jurusan->nama) ?></span>
              <span class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-full">
                ID: <?= $jurusan->id_jurusan ?>
              </span>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p class="text-gray-500 text-center py-4">Belum ada data jurusan.</p>
      <?php endif; ?>
    </div>

    <!-- Daftar Kriteria -->
    <div class="bg-white shadow-lg rounded-lg p-6">
      <h3 class="text-xl font-semibold mb-4 text-gray-800">Daftar Kriteria</h3>
      <?php if (isset($kriteria_list) && !empty($kriteria_list)): ?>
        <div class="space-y-2">
          <?php foreach ($kriteria_list as $index => $kriteria): ?>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
              <div>
                <span class="font-medium text-gray-700"><?= htmlspecialchars($kriteria->nama) ?></span>
                <span class="text-sm text-gray-500 block"><?= htmlspecialchars($kriteria->kode) ?></span>
              </div>
              <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">
                <?= ucfirst($kriteria->sifat) ?>
              </span>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p class="text-gray-500 text-center py-4">Belum ada data kriteria.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Quick Actions -->
  <div class="mt-8">
    <h3 class="text-xl font-semibold mb-4 text-gray-800">Aksi Cepat</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <a href="<?= base_url('mahasiswa/create') ?>" class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 p-4 rounded-lg text-center transition duration-200">
        <div class="text-2xl mb-2">➕</div>
        <div class="font-medium">Tambah Mahasiswa</div>
      </a>
      <a href="<?= base_url('jurusan/create') ?>" class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 p-4 rounded-lg text-center transition duration-200">
        <div class="text-2xl mb-2">🏫</div>
        <div class="font-medium">Tambah Jurusan</div>
      </a>
      <a href="<?= base_url('kriteria/tambah') ?>" class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 p-4 rounded-lg text-center transition duration-200">
        <div class="text-2xl mb-2">📊</div>
        <div class="font-medium">Tambah Kriteria</div>
      </a>
      <a href="<?= base_url('bobot/create') ?>" class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 p-4 rounded-lg text-center transition duration-200">
        <div class="text-2xl mb-2">⚖️</div>
        <div class="font-medium">Tambah Bobot</div>
      </a>
    </div>
  </div>
</div>