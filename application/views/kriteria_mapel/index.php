<div class="">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Data Kriteria & Mapel</h1>
    <a onclick="document.getElementById('modalKriteriaMapel').classList.remove('hidden')"
            class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
            + Tambah
    </a>
  </div>

  <?php foreach ($kriteria_mapel as $row): ?>
    <div class="bg-white rounded-xl shadow-lg mb-6 overflow-hidden">
      <div class="bg-gradient-to-r from-gray-600 to-gray-700 px-6 py-4">
        <h2 class="text-white font-semibold flex items-center">
            <i class="fas fa-list mr-2"></i> 
            <?= $row['kriteria'] ?> (<?= $row['kode'] ?>)
        </h2>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full border-collapse">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 border-b">Mata Pelajaran</th>
              <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 border-b">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <?php foreach ($row['mapel'] as $m): ?>
              <tr class="hover:bg-gray-50 transition">
                <td class="px-4 py-3 text-sm text-gray-800"><?= $m['nama_mapel'] ?></td>
                <td class="px-4 py-3 text-center">
                  <div class="flex justify-center space-x-2">
                    <a onclick="document.getElementById('modalEdit<?= $m['id'] ?>').classList.remove('hidden')" 
                          class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xs flex items-center">
                          <i class="fas fa-edit mr-1"></i>Edit
                      </a>
                    <a href="<?= base_url("kriteriaMapel/delete/{$m['id']}") ?>"
                      onclick="return confirm('Yakin hapus mapel ini?')"
                      class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs">Hapus</a>
                  </div>
                </td>
              </tr>

              <div id="modalEdit<?= $m['id'] ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative">
    <?php 
      $detail = $this->KriteriaMapel_model->get_by_id($m['id']); 
      $this->load->view('kriteria_mapel/edit', [
        'kriteria_mapel' => $detail,
        'kriteria'       => $kriteria,
        'mapel'          => $mapel
      ]); 
    ?>
  </div>
</div>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  <?php endforeach; ?>
</div>

<div id="modalKriteriaMapel" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative">
    <?php $this->load->view('kriteria_mapel/create'); ?>
  </div>
</div>

