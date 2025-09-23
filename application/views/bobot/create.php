<div class="max-w-lg mx-auto bg-white rounded-xl shadow-lg overflow-hidden w-full">
  <!-- Header -->
  <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white py-4 px-6">
    <h2 class="text-xl font-bold text-center">Tambah Bobot</h2>
  </div>

  <!-- Body -->
  <div class="p-6">
    <form method="post" action="<?= base_url('bobot/create') ?>" class="space-y-5">
      <!-- Jurusan -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Jurusan</label>
        <select name="id_jurusan" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
          <?php foreach ($jurusan as $j): ?>
            <option value="<?= $j['id_jurusan'] ?>"><?= $j['nama'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Kriteria -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Kriteria</label>
        <select name="id_kriteria" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
          <?php foreach ($kriteria as $k): ?>
            <option value="<?= $k['id_kriteria'] ?>"><?= $k['nama'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Bobot -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Bobot</label>
        <input type="number" name="bobot" value="" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
               placeholder="Masukkan nilai bobot">
      </div>

      <!-- Tombol -->
      <div class="flex justify-end gap-3 pt-4 border-t">
        <button type="button" onclick="document.getElementById('modalBobot').classList.add('hidden')"
                class="px-5 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
          Batal
        </button>
        <button type="submit"
                class="px-6 py-2 rounded-lg bg-purple-600 text-white font-semibold hover:bg-purple-700 shadow transition">
          Simpan
        </button>
      </div>
    </form>
  </div>
</div>
