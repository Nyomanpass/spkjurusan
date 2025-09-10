

<div class="p-6 max-w-xl">
  <div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Edit Jurusan</h2>

    <?php if(empty($jurusan)): ?>
      <div class="text-red-600">Data jurusan tidak ditemukan.</div>
    <?php else: ?>
      <form method="post" action="<?= base_url('jurusan/edit/'.$jurusan['id_jurusan']) ?>" class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Nama Jurusan</label>
          <input type="text" name="nama" required value="<?= htmlspecialchars($jurusan['nama']) ?>"
                 class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="flex items-center gap-3 mt-4">
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
          <a href="<?= base_url('jurusan') ?>" class="text-gray-600 hover:underline">Batal</a>
        </div>
      </form>
    <?php endif; ?>
  </div>
</div>


