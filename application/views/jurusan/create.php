<div class="px-6 max-w-md mx-auto ">
  <a href="<?= base_url('jurusan') ?>" class="inline-block text-black hover:text-blue-600 font-semibold">
    &larr; Kembali ke Daftar Jurusan
  </a>
</div>


<div class="p-6 max-w-md mx-auto">
  <div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Tambah Jurusan</h2>

    <form method="post" action="<?= base_url('jurusan/create') ?>" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Jurusan</label>
        <input type="text" name="nama" required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div class="flex items-center gap-3 mt-4">
        <button type="submit" class="w-full mt-4 rounded-lg bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>

      </div>
    </form>
  </div>
</div>