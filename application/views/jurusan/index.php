<div class="min-h-screen">
  <div class="">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
      <div>
        <h2 class="text-2xl font-bold text-gray-800 mb-1">Tabel Jurusan</h2>
        <p class="text-gray-600 text-sm">Data jurusan yang tersedia di sistem</p>
      </div>
      <a onclick="document.getElementById('modalJurusan').classList.remove('hidden')"
        class="inline-flex items-center px-5 py-2.5 bg-orange-600 text-white text-sm font-medium rounded-lg shadow-sm hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-all duration-200">
        + Tambah Jurusan
      </a>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gradient-to-r from-orange-600 to-orange-700">
            <tr>
              <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                ID
              </th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                Nama Jurusan
              </th>
              <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">
                Aksi
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php if (!empty($jurusan)): ?>
              <?php foreach ($jurusan as $j): ?>
                <tr class="hover:bg-orange-50 transition-colors duration-150">
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <?= $j['id_jurusan'] ?>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                    <?= htmlspecialchars($j['nama']) ?>
                  </td>
                  <td class="px-4 py-3 text-center">
                    <div class="flex justify-center space-x-2">
                      <a onclick="document.getElementById('modalEdit<?= $j['id_jurusan'] ?>').classList.remove('hidden')"
                        class="px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xs transition duration-200 flex items-center">
                        <i class="fas fa-edit mr-1"></i>Edit
                      </a>
                      <a href="<?= base_url("jurusan/delete/{$j['id_jurusan']}") ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                        class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs transition duration-200 flex items-center">
                        <i class="fas fa-trash mr-1"></i>Hapus
                      </a>
                    </div>
                  </td>
                </tr>

                <!-- Modal Edit -->
                <div id="modalEdit<?= $j['id_jurusan'] ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
                  <div class="rounded-xl w-full max-w-2xl p-6 relative">
                    <?php $this->load->view('jurusan/edit', ['jurusan' => $j]); ?>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="3" class="px-6 py-8 text-center text-gray-500">
                  Belum ada data jurusan.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Jurusan -->
<div id="modalJurusan" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative">
    <?php $this->load->view('jurusan/create'); ?>
  </div>
</div>