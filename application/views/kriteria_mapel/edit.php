<div class="bg-white rounded-xl shadow-lg p-6">
  <h2 class="text-lg font-bold mb-4 text-gray-800">Edit Kriteria Mapel</h2>

  <form method="post" action="<?= base_url('kriteriaMapel/edit/'.$kriteria_mapel['id']) ?>" class="space-y-4">
    <!-- Pilih Kriteria -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Kriteria</label>
      <select name="id_kriteria" class="w-full border rounded-lg px-3 py-2">
        <?php foreach ($kriteria as $k): ?>
          <option value="<?= $k['id_kriteria'] ?>" 
            <?= ($k['id_kriteria'] == $kriteria_mapel['id_kriteria']) ? 'selected' : '' ?>>
            <?= $k['nama'] ?> (<?= $k['kode'] ?>)
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Pilih Mapel -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
      <select name="id_mapel" class="w-full border rounded-lg px-3 py-2">
        <?php foreach ($mapel as $m): ?>
          <option value="<?= $m['id_mapel'] ?>" 
            <?= ($m['id_mapel'] == $kriteria_mapel['id_mapel']) ? 'selected' : '' ?>>
            <?= $m['nama_mapel'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="flex justify-end space-x-2">
      <button type="button" 
              onclick="document.getElementById('modalEdit<?= $kriteria_mapel['id'] ?>').classList.add('hidden')" 
              class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
      <button type="submit" 
              class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">Simpan</button>
    </div>
  </form>
</div>
