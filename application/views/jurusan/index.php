

<div class="p-6">
  <div class="flex items-center justify-between mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Data Jurusan</h2>
    <a href="<?= base_url('jurusan/create') ?>" class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
      + Tambah Jurusan
    </a>
  </div>

  <div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full divide-y">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">ID</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Nama Jurusan</th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y">
        <?php if(!empty($jurusan)): ?>
          <?php foreach($jurusan as $j): ?>
            <tr>
              <td class="px-6 py-4 text-sm text-gray-700"><?= $j['id_jurusan'] ?></td>
              <td class="px-6 py-4 text-sm text-gray-700"><?= htmlspecialchars($j['nama']) ?></td>
              <td class="px-6 py-4 text-sm">
                <a href="<?= base_url('jurusan/edit/'.$j['id_jurusan']) ?>" class="inline-block px-3 py-1 mr-2 bg-yellow-400 text-white rounded hover:bg-yellow-500">Edit</a>
                <a href="<?= base_url('jurusan/delete/'.$j['id_jurusan']) ?>" onclick="return confirm('Yakin ingin menghapus jurusan ini?')" class="inline-block px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" class="px-6 py-8 text-center text-gray-500">Belum ada data jurusan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

