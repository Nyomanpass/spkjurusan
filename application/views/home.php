<div class="min-h-screen bg-gray-100">

  <!-- Header -->
  <div class="flex items-center justify-between mb-8 bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-5 rounded-xl shadow-lg">
    <h1 class="text-xl"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard Sistem Pendukung Keputusan</h1>
    <div class="flex gap-5 items-center">
      <span class="text-sm md:text-base opacity-90"><i class="fas fa-user mr-2"></i>Welcome, Admin</span>
      <a href="<?= base_url('login/logout') ?>"
          class="flex items-center px-4 py-3 rounded-lg hover:text-white hover:bg-red-600 text-white transition">
          <i class="fas fa-sign-out-alt w-5 mr-3"></i> Logout
        </a>
    </div>
  </div>

  <!-- Statistik Cards -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <!-- Mahasiswa -->
    <div class="bg-white shadow-lg rounded-xl p-6 border-l-4 border-blue-500 hover:shadow-xl transition">
      <div class="flex items-center">
        <div class="flex-1">
          <p class="text-sm text-gray-500">Total Mahasiswa</p>
          <p class="text-3xl font-bold text-gray-800"><?= $total_mahasiswa ?? 0 ?></p>
        </div>
        <div class="p-3 bg-blue-100 text-blue-600 rounded-full text-2xl">
          <i class="fas fa-user-graduate"></i>
        </div>
      </div>
    </div>

    <!-- Jurusan -->
    <div class="bg-white shadow-lg rounded-xl p-6 border-l-4 border-orange-500 hover:shadow-xl transition">
      <div class="flex items-center">
        <div class="flex-1">
          <p class="text-sm text-gray-500">Total Jurusan</p>
          <p class="text-3xl font-bold text-gray-800"><?= $total_jurusan ?? 0 ?></p>
        </div>
        <div class="p-3 bg-orange-100 text-orange-600 rounded-full text-2xl">
          <i class="fas fa-university"></i>
        </div>
      </div>
    </div>

    <!-- Kriteria -->
    <div class="bg-white shadow-lg rounded-xl p-6 border-l-4 border-yellow-500 hover:shadow-xl transition">
      <div class="flex items-center">
        <div class="flex-1">
          <p class="text-sm text-gray-500">Total Kriteria</p>
          <p class="text-3xl font-bold text-gray-800"><?= $total_kriteria ?? 0 ?></p>
        </div>
        <div class="p-3 bg-yellow-100 text-yellow-600 rounded-full text-2xl">
          <i class="fas fa-chart-bar"></i>
        </div>
      </div>
    </div>

    <!-- Bobot -->
    <div class="bg-white shadow-lg rounded-xl p-6 border-l-4 border-purple-500 hover:shadow-xl transition">
      <div class="flex items-center">
        <div class="flex-1">
          <p class="text-sm text-gray-500">Total Bobot</p>
          <p class="text-3xl font-bold text-gray-800"><?= $total_bobot ?? 0 ?></p>
        </div>
        <div class="p-3 bg-purple-100 text-purple-600 rounded-full text-2xl">
          <i class="fas fa-balance-scale"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Informasi Detail -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Daftar Jurusan -->
    <div class="bg-white shadow-lg rounded-xl p-6">
      <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center gap-2">
        <i class="fas fa-university"></i> Daftar Jurusan
      </h3>
      <?php if (!empty($jurusan_list)): ?>
        <div class="space-y-2">
          <?php foreach ($jurusan_list as $jurusan): ?>
            <div class="flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition">
              <span class="font-medium text-gray-700"><?= htmlspecialchars($jurusan['nama']) ?></span>
              <span class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded-full">
                ID: <?= $jurusan['id_jurusan'] ?>
              </span>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p class="text-gray-500 text-center py-4">Belum ada data jurusan.</p>
      <?php endif; ?>
    </div>

    <!-- Daftar Kriteria -->
    <div class="bg-white shadow-lg rounded-xl p-6">
      <h3 class="text-xl font-semibold mb-4 text-gray-800 flex items-center gap-2">
        <i class="fas fa-chart-bar"></i> Daftar Kriteria
      </h3>
      <?php if (!empty($kriteria_list)): ?>
        <div class="space-y-2">
          <?php foreach ($kriteria_list as $kriteria): ?>
            <div class="flex items-center justify-between p-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition">
              <div>
                <span class="font-medium text-gray-700"><?= htmlspecialchars($kriteria['nama']) ?></span>
                <span class="text-sm text-gray-500 block"><?= htmlspecialchars($kriteria['kode']) ?></span>
              </div>
              <span class="bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded-full">
                <?= ucfirst($kriteria['sifat']) ?>
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
  <div class="mt-10">
    <h3 class="text-xl font-semibold mb-4 text-gray-800"><i class="fas fa-bolt mr-2"></i> Aksi Cepat</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <!-- Tombol trigger modal -->
      <button onclick="document.getElementById('modalMahasiswa').classList.remove('hidden')"
        class="bg-white border hover:border-blue-500 hover:bg-blue-50 text-gray-700 p-6 rounded-xl text-center shadow transition w-full">
        <div class="text-3xl mb-2 text-blue-600"><i class="fas fa-user-plus"></i></div>
        <div class="font-medium">Tambah Mahasiswa</div>
      </button>

      <a onclick="document.getElementById('modalJurusan').classList.remove('hidden')" class="bg-white border hover:border-orange-500 hover:bg-orange-50 text-gray-700 p-6 rounded-xl text-center shadow transition">
        <div class="text-3xl mb-2 text-orange-600"><i class="fas fa-plus-circle"></i></div>
        <div class="font-medium">Tambah Jurusan</div>
      </a>
      <a onclick="document.getElementById('modalKriteria').classList.remove('hidden')" class="bg-white border hover:border-yellow-500 hover:bg-yellow-50 text-gray-700 p-6 rounded-xl text-center shadow transition">
        <div class="text-3xl mb-2 text-yellow-600"><i class="fas fa-plus-square"></i></div>
        <div class="font-medium">Tambah Kriteria</div>
      </a>
      <a onclick="document.getElementById('modalBobot').classList.remove('hidden')" class="bg-white border hover:border-purple-500 hover:bg-purple-50 text-gray-700 p-6 rounded-xl text-center shadow transition">
        <div class="text-3xl mb-2 text-purple-600"><i class="fas fa-scale-balanced"></i></div>
        <div class="font-medium">Tambah Bobot</div>
      </a>
    </div>
  </div>
</div>


<!-- Modal Tambah Mahasiswa -->
<div id="modalMahasiswa" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative">
    <?php $this->load->view('mahasiswa/create'); ?>
  </div>
</div>

<!-- jurusan modal -->
<div id="modalJurusan" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative">
    <?php $this->load->view('jurusan/create'); ?>
  </div>
</div>

<!-- modal kriteria -->
<div id="modalKriteria" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative">
    <?php $this->load->view('kriteria/tambah'); ?>
  </div>
</div>

<!-- modal bobot -->
<div id="modalBobot" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative">
    <?php $this->load->view('bobot/create'); ?>
  </div>
</div>
