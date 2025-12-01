<div class="mb-10">
  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Master Range Nilai Mapel</h1>
    <!-- Modal Tambah Range -->

    <button onclick="document.getElementById('modalTambahRange').classList.remove('hidden')"
        class="px-5 py-2.5 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
        + Tambah Range
    </button>


    <div id="modalTambahRange" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/70">
        <div class="relative z-[10000] w-full max-w-2xl ">
            <?php $this->load->view('range_mapel/add'); ?>
        </div>
    </div>


  </div>

  <!-- Card -->
  <div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Card Header -->
    <div class="bg-gradient-to-r from-gray-600 to-gray-700 px-6 py-4">
      <h2 class="text-white font-semibold flex items-center">
        <i class="fas fa-layer-group mr-2"></i> Daftar Range Nilai
      </h2>
    </div>

    <!-- Table -->
    <table class="w-full border-collapse">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 border-b">Nilai Min</th>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 border-b">Nilai Max</th>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 border-b">Keterangan</th>
          <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 border-b">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <?php foreach ($range as $r): ?>
          <tr class="hover:bg-gray-50 transition">
            
            <td class="px-4 py-3 text-sm text-gray-800"><?= $r->nilai_min ?></td>
            <td class="px-4 py-3 text-sm text-gray-800"><?= $r->nilai_max ?></td>
            <td class="px-4 py-3 text-sm font-medium text-gray-900"><?= $r->keterangan ?></td>

            <td class="px-4 py-3 text-center">
              <div class="flex justify-center space-x-2">

                <!-- Edit -->
                <button onclick="document.getElementById('modalEditRange<?= $r->id_range ?>').classList.remove('hidden')"
                class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xs flex items-center transition">
                <i class="fas fa-edit mr-1"></i> Edit
                </button>

                <!-- Delete -->
                <a href="<?= base_url('rangemapel/delete/'.$r->id_range) ?>"
                  onclick="return confirm('Hapus data ini?')"
                  class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs flex items-center transition">
                  <i class="fas fa-trash mr-1"></i> Hapus
                </a>

              </div>
            </td>
          </tr>
            <!-- MODAL EDIT RANGE -->
        <div id="modalEditRange<?= $r->id_range ?>" 
            class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/75">
            <div class="rounded-xl w-full max-w-2xl p-6 relative shadow-lg">
            <?php $this->load->view('range_mapel/edit', ['range' => $r]); ?>
            </div>
        </div>
        <?php endforeach; ?>
        
      </tbody>
    </table>

  </div>
</div>

<div id="modalTambahRange" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative shadow-lg">
    <?php $this->load->view('range_mapel/add'); ?>
  </div>
</div>
