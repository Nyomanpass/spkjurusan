<div class="min-h-screen">
  <div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
      <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-1">Tabel Data Kriteria</h2>
        <p class="text-gray-600 text-sm">Daftar kriteria yang digunakan dalam perhitungan</p>
      </div>
      <a onclick="document.getElementById('modalKriteria').classList.remove('hidden')"
        class="inline-flex items-center px-5 py-2.5 bg-yellow-600 text-white text-sm font-medium rounded-lg shadow-sm hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition-all duration-200">
        + Tambah
      </a>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gradient-to-r from-yellow-600 to-yellow-700">
            <tr>
              <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">ID</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Kode</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Nama</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Sifat</th>
              <th class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php foreach ($kriteria as $row): ?>
              <tr class="hover:bg-yellow-50 transition-colors duration-150">
                <td class="px-6 py-4 text-sm text-gray-900"><?= $row['id_kriteria'] ?></td>
                <td class="px-6 py-4 text-sm text-gray-900"><?= $row['kode'] ?></td>
                <td class="px-6 py-4 text-sm text-gray-900"><?= $row['nama'] ?></td>
                <td class="px-6 py-4 text-sm text-gray-900"><?= $row['sifat'] ?></td>
                <td class="px-4 py-3 text-center">
                  <div class="flex justify-center space-x-2">
                    <a onclick="document.getElementById('modalEdit<?= $row['id_kriteria'] ?>').classList.remove('hidden')"
                      class="px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xs transition duration-200 flex items-center">
                      <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                    <a href="<?= base_url("kriteria/delete/{$row['id_kriteria']}") ?>"
                      onclick="return confirm('Yakin ingin menghapus data ini?')"
                      class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs transition duration-200 flex items-center">
                      <i class="fas fa-trash mr-1"></i>Hapus
                    </a>
                  </div>
                </td>
              </tr>

              <!-- Modal Edit -->
              <div id="modalEdit<?= $row['id_kriteria'] ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
                <div class="rounded-xl w-full max-w-2xl p-6 relative">
                  <?php $this->load->view('kriteria/edit', ['kriteria' => $row]); ?>
                </div>
              </div>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div id="modalKriteria" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative">
    <?php $this->load->view('kriteria/tambah'); ?>
  </div>
</div>