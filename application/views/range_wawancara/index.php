<div class="mb-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Range Wawancara</h1>

    <a onclick="document.getElementById('modalAddWawancara').classList.remove('hidden')"
      class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700">
      <i class="fas fa-plus mr-2"></i> Tambah Range Wawancara
    </a>
  </div>

  <div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-gray-600 to-gray-700 px-6 py-4">
      <h2 class="text-white font-semibold flex items-center">
        <i class="fas fa-list mr-2"></i> Daftar Range Wawancara
      </h2>
    </div>

    <table class="w-full border-collapse">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-3 text-left text-xs font-semibold">Min</th>
          <th class="px-4 py-3 text-left text-xs font-semibold">Max</th>
          <th class="px-4 py-3 text-left text-xs font-semibold">Keterangan</th>
          <th class="px-4 py-3 text-center text-xs font-semibold">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($wawancara as $w): ?>
          <tr class="hover:bg-gray-50 transition">
            <td class="px-4 py-3 text-sm"><?= $w->nilai_min ?></td>
            <td class="px-4 py-3 text-sm"><?= $w->nilai_max ?></td>
            <td class="px-4 py-3 text-sm"><?= $w->keterangan ?></td>

            <td class="px-4 py-3 text-center">
              <div class="flex justify-center space-x-2">

                <a onclick="document.getElementById('modalEditWawancara<?= $w->id_range_wawancara ?>').classList.remove('hidden')"
                   class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xs flex items-center">
                  <i class="fas fa-edit mr-1"></i>Edit
                </a>

                <a href="<?= base_url('rangewawancara/delete/'.$w->id_range_wawancara) ?>"
                   onclick="return confirm('Yakin hapus data ini?')"
                   class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs flex items-center">
                  <i class="fas fa-trash mr-1"></i>Hapus
                </a>
              </div>
            </td>
          </tr>

          <!-- Modal Edit -->
          <div id="modalEditWawancara<?= $w->id_range_wawancara ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
            <div class="rounded-xl w-full max-w-2xl p-6 relative bg-white">
              <?php $this->load->view('range_wawancara/edit', ['wawancara' => $w]); ?>
            </div>
          </div>

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Tambah -->
<div id="modalAddWawancara" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative bg-white">
    <?php $this->load->view('range_wawancara/create'); ?>
  </div>
</div>
