<div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden w-full">
  <!-- Header -->
  <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-4 px-6">
    <h2 class="text-xl font-bold text-center">Edit Jurusan</h2>
  </div>

  <!-- Body -->
  <div class="p-6">
    <?php if (empty($jurusan)): ?>
      <div class="text-red-600 text-center">Data jurusan tidak ditemukan.</div>
    <?php else: ?>
      <form method="post" action="<?= base_url('jurusan/edit/' . $jurusan['id_jurusan']) ?>" class="space-y-5">
        <!-- Hidden input id (optional) -->
        <input type="hidden" name="id_jurusan" value="<?= $jurusan['id_jurusan'] ?>">

        <!-- Nama Jurusan -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Jurusan</label>
          <input type="text" name="nama" value="<?= htmlspecialchars($jurusan['nama']) ?>" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition">
        </div>

        <!-- Tombol -->
        <div class="flex justify-end gap-3 pt-4 border-t">
          <a href="<?= base_url('jurusan') ?>"
            class="px-5 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
            Batal
          </a>
          <button type="submit"
            class="px-6 py-2 rounded-lg bg-orange-600 text-white font-semibold hover:bg-orange-700 shadow transition">
            Update
          </button>
        </div>
      </form>
    <?php endif; ?>
  </div>
</div>
