<div class="max-w-4xl mx-auto">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Data Mata Pelajaran</h1>
    <a onclick="document.getElementById('modalmatapelajaran').classList.remove('hidden')"
            class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
            + Tambah
    </a>
  </div>

  <div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <table class="w-full border-collapse">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 border-b">ID</th>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 border-b">Nama Mapel</th>
          <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 border-b">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php foreach ($mapel as $m): ?>
          <tr class="hover:bg-gray-50 transition">
            <td class="px-4 py-3 text-sm text-gray-800"><?= $m['id_mapel'] ?></td>
            <td class="px-4 py-3 text-sm font-medium text-gray-900"><?= $m['nama_mapel'] ?></td>
            <td class="px-4 py-3 text-center">
              <a onclick="document.getElementById('modalEditmapel<?= $m['id_mapel'] ?>').classList.remove('hidden')"
                      class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xs transition duration-200 flex items-center">
                      <i class="fas fa-edit mr-1"></i>Edit
                    </a>
              <a href="<?= base_url('mataPelajaran/delete/'.$m['id_mapel']) ?>"
                 onclick="return confirm('Yakin hapus mapel ini?')"
                 class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs inline-block">
                 <i class="fas fa-trash mr-1"></i> Hapus
              </a>
            </td>
          </tr>

          <div id="modalEditmapel<?= $m['id_mapel'] ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
                <div class="rounded-xl w-full max-w-2xl p-6 relative">
                  <?php $this->load->view('matapelajaran/edit', ['mapel' => $m]); ?>
                </div>
              </div>

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<!-- Modal Tambah -->
<div id="modalmatapelajaran" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative">
    <?php $this->load->view('matapelajaran/create'); ?>
  </div>
</div>
