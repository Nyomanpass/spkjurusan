<div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden w-full">
  <!-- Header -->
  <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white py-4 px-6">
    <h2 class="text-xl font-bold text-center">Edit Bobot</h2>
  </div>

  <!-- Body -->
  <div class="p-6">
    <?php if (empty($bobot)): ?>
      <div class="text-red-600 text-center">Data bobot tidak ditemukan.</div>
    <?php else: ?>
      <form method="post" action="<?= base_url('bobot/edit/' . $bobot['id_bobot']) ?>" class="space-y-5">

        <!-- Pilih Jurusan -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Jurusan</label>
          <select name="id_jurusan" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
            <?php foreach ($jurusan as $j): ?>
              <option value="<?= $j['id_jurusan'] ?>" <?= $bobot['id_jurusan'] == $j['id_jurusan'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($j['nama']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Pilih Kriteria -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Kriteria</label>
          <select name="id_kriteria" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
            <?php foreach ($kriteria as $k): ?>
              <option value="<?= $k['id_kriteria'] ?>" <?= $bobot['id_kriteria'] == $k['id_kriteria'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($k['nama']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Input Bobot -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Bobot</label>
          <input type="number" name="bobot" value="<?= $bobot['bobot'] ?>" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
        </div>

        <!-- Tombol -->
        <div class="flex justify-end gap-3 pt-4 border-t">
          <a href="<?= base_url('bobot') ?>"
            class="px-5 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
            Batal
          </a>
          <button type="submit"
            class="px-6 py-2 rounded-lg bg-purple-600 text-white font-semibold hover:bg-purple-700 shadow transition">
            Simpan
          </button>
        </div>
      </form>
    <?php endif; ?>
  </div>
</div>
