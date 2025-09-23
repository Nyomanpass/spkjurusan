<div class="min-h-screen  v">
  <div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:justify-between items-center mb-6 gap-4">
      <h1 class="text-2xl font-bold text-gray-800">Data Bobot Jurusan</h1>
      <button onclick="document.getElementById('modalBobot').classList.remove('hidden')"
        class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg shadow-md">
        <i class="fas fa-plus mr-2"></i> Tambah Bobot
      </button>
    </div>


    <?php
    if (!empty($bobot_list)):
      $currentJurusan = '';
      foreach ($bobot_list as $b):
        if ($currentJurusan != $b['jurusan']):
          if ($currentJurusan != ''): ?>
            </tbody>
            </table>
  </div>

</div>
<?php endif; ?>

<!-- Card Jurusan -->
<div class="bg-white rounded-xl shadow-lg mb-6 overflow-hidden">
  <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
    <h2 class="text-white flex items-center font-semibold">
      <i class="fas fa-graduation-cap mr-2"></i><?= $b['jurusan'] ?>
    </h2>
  </div>
  <div class="overflow-x-auto">
    <table class="w-full border-collapse">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 border-b">ID</th>
          <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 border-b">Kriteria</th>
          <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 border-b">Bobot</th>
          <th class="px-4 py-3 text-center text-xs font-semibold text-gray-600 border-b">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
      <?php $currentJurusan = $b['jurusan'];
        endif; ?>

      <!-- Row Data -->
      <tr class="hover:bg-gray-50 transition">
        <td class="px-4 py-3 text-sm text-gray-800"><?= $b['id_bobot'] ?></td>
        <td class="px-4 py-3 text-sm font-medium text-gray-900"><?= $b['kriteria'] ?></td>
        <td class="px-4 py-3 text-center">
          <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-700"><?= $b['bobot'] ?></span>
        </td>
        <td class="px-4 py-3 text-center">
          <div class="flex justify-center space-x-2">
            <button onclick="document.getElementById('modalEdit<?= $b['id_bobot'] ?>').classList.remove('hidden')"
              class="px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xs flex items-center transition">
              <i class="fas fa-edit mr-1"></i>Edit
            </button>
            <a href="<?= base_url("bobot/delete/{$b['id_bobot']}") ?>"
              onclick="return confirm('Yakin ingin menghapus data ini?')"
              class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs flex items-center transition">
              <i class="fas fa-trash mr-1"></i>Hapus
            </a>
          </div>
        </td>
      </tr>

      <!-- Modal Edit Bobot -->
      <div id="modalEdit<?= $b['id_bobot'] ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
        <div class="rounded-xl w-full max-w-2xl p-6 relative">
          <?php $this->load->view('bobot/edit', ['bobot' => $b]); ?>
        </div>
      </div>

    <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php else: ?>
  <!-- Kosong -->
  <div class="bg-white rounded-xl shadow-lg p-10 text-center">
    <i class="fas fa-inbox text-gray-400 text-6xl mb-4"></i>
    <h3 class="text-lg font-semibold text-gray-600 mb-2">Belum ada data bobot</h3>
    <p class="text-gray-500 mb-4">Silakan tambah data bobot jurusan terlebih dahulu</p>
    <button onclick="document.getElementById('modalBobot').classList.remove('hidden')"
      class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg shadow-md transition duration-200">
      Tambah Data Pertama
    </button>
  </div>
<?php endif; ?>

</div>
</div>

<!-- Modal Tambah Bobot -->
<div id="modalBobot" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl p-6 relative">
    <?php $this->load->view('bobot/create'); ?>
  </div>
</div>