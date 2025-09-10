

<div class="p-6 max-w-xl">
  <div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Tambah Jurusan</h2>

    <form method="post" action="<?= base_url('jurusan/create') ?>" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Jurusan</label>
        <input type="text" name="nama" required
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div class="flex items-center gap-3 mt-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        <a href="<?= base_url('jurusan') ?>" class="text-gray-600 hover:underline">Batal</a>
      </div>
    </form>
  </div>
</div>


