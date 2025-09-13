<div class="p-6">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">Data Kriteria</h2>
    <a href="<?= base_url('kriteria/tambah') ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">+ Tambah</a>
  </div>

  <div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="w-full min-w-full">
      <thead class="bg-gray-50 border-b border-gray-200">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sifat</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <?php foreach ($kriteria as $row): ?>
          <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $row->id_kriteria ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $row->kode ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $row->nama ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $row->sifat ?></td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <div class="flex space-x-2">
                <a href="<?= base_url('kriteria/edit/' . $row->id_kriteria) ?>" class="text-blue-600 hover:text-blue-900 px-3 py-1 rounded border border-blue-600 hover:bg-blue-50 transition duration-200">Edit</a>
                <a href="<?= base_url('kriteria/delete/' . $row->id_kriteria) ?>" class="text-red-600 hover:text-red-900 px-3 py-1 rounded border border-red-600 hover:bg-red-50 transition duration-200" onclick="return confirm('Hapus data ini?')">hapus</a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>