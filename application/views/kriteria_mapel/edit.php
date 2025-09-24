<div class="max-w-3xl bg-white mx-auto rounded-2xl shadow-lg overflow-hidden">
  <!-- Header -->
  <div class="bg-gradient-to-r from-yellow-600 to-yellow-600 text-white py-4 px-6">
    <h2 class="text-xl font-bold text-center">Edit Kriteria Mapel</h2>
  </div>

  <!-- Form -->
  <div class="p-6">
    <form method="post" action="<?= base_url('kriteriaMapel/edit/'.$kriteria_mapel['id']) ?>" class="space-y-6">
      
      <!-- Dropdown Kriteria -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Kriteria</label>
        <select name="id_kriteria" required
          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200 hover:border-yellow-400">
          <?php foreach ($kriteria as $k): ?>
            <option value="<?= $k['id_kriteria'] ?>" 
              <?= ($k['id_kriteria'] == $kriteria_mapel['id_kriteria']) ? 'selected' : '' ?>>
              <?= $k['nama'] ?> (<?= $k['kode'] ?>)
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Dropdown Mapel -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Mata Pelajaran</label>
        <select name="id_mapel" required
          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200 hover:border-yellow-400">
          <?php foreach ($mapel as $m): ?>
            <option value="<?= $m['id_mapel'] ?>" 
              <?= ($m['id_mapel'] == $kriteria_mapel['id_mapel']) ? 'selected' : '' ?>>
              <?= $m['nama_mapel'] ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Tombol Aksi -->
      <div class="flex justify-end gap-3 pt-6 border-t">
        <button type="button"
          onclick="document.getElementById('modalEdit<?= $kriteria_mapel['id'] ?>').classList.add('hidden')"
          class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition duration-200">
          Batal
        </button>
        <button type="submit"
          class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transform transition duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</div>
