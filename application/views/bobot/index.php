<div class="p-6 bg-gray-50 min-h-screen">
  <div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800">Data Bobot Jurusan</h1>
      <a href="<?= base_url('bobot/create') ?>"
        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-md transition duration-200 flex items-center">
        <i class="fas fa-plus mr-2"></i>
        Tambah Bobot
      </a>
    </div>

    <?php
    $currentJurusan = '';
    foreach ($bobot as $b):
      if ($currentJurusan != $b->jurusan):
        if ($currentJurusan != ''): ?>
          </tbody>
          </table>
  </div>
</div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-lg mb-6 overflow-hidden">
  <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
    <h2 class="text-xl font-semibold text-white flex items-center">
      <i class="fas fa-graduation-cap mr-3"></i>
      <?= $b->jurusan ?>
    </h2>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full">
      <thead class="bg-white">
        <tr>
          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 border-b">ID</th>
          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 border-b">Kriteria</th>
          <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 border-b">Bobot</th>
          <th class="px-4 py-3 text-center text-sm font-medium text-gray-700 border-b">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
      <?php
        $currentJurusan = $b->jurusan;
      endif;
      ?>
      <tr class="hover:bg-gray-50 transition duration-150">
        <td class="px-4 py-3 text-sm text-gray-900"><?= $b->id_bobot ?></td>
        <td class="px-4 py-3 text-sm text-gray-900 font-medium"><?= $b->kriteria ?></td>
        <td class="px-4 py-3 text-sm">
          <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
            <?= $b->bobot ?>
          </span>
        </td>
        <td class="px-4 py-3 text-center">
          <div class="flex justify-center space-x-2">
            <a href="<?= base_url("bobot/edit/{$b->id_bobot}") ?>"
              class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-sm transition duration-200 flex items-center">
              <i class="fas fa-edit mr-1"></i>
              Edit
            </a>
            <a href="<?= base_url("bobot/delete/{$b->id_bobot}") ?>"
              onclick="return confirm('Yakin ingin menghapus data ini?')"
              class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-sm transition duration-200 flex items-center">
              <i class="fas fa-trash mr-1"></i>
              Hapus
            </a>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php if (empty($bobot)): ?>
  <div class="bg-white rounded-lg shadow-lg p-8 text-center">
    <i class="fas fa-inbox text-gray-400 text-6xl mb-4"></i>
    <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum ada data bobot</h3>
    <p class="text-gray-500 mb-4">Silakan tambah data bobot jurusan terlebih dahulu</p>
    <a href="<?= base_url('bobot/create') ?>"
      class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200">
      Tambah Data Pertama
    </a>
  </div>
<?php endif; ?>
</div>
</div>