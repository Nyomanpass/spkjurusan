<div class="p-6 max-w-lg mx-auto">
  <h1 class="text-xl font-bold mb-4"><?= isset($bobot) ? 'Edit Bobot' : 'Tambah Bobot' ?></h1>
  <form method="post" class="space-y-4">
    <div>
      <label class="block">Jurusan</label>
      <select name="id_jurusan" class="w-full border rounded p-2">
        <?php foreach($jurusan as $j): ?>
          <option value="<?= $j->id_jurusan ?>" <?= isset($bobot) && $bobot->id_jurusan == $j->id_jurusan ? 'selected' : '' ?>>
            <?= $j->nama ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div>
      <label class="block">Kriteria</label>
      <select name="id_kriteria" class="w-full border rounded p-2">
        <?php foreach($kriteria as $k): ?>
          <option value="<?= $k->id_kriteria ?>" <?= isset($bobot) && $bobot->id_kriteria == $k->id_kriteria ? 'selected' : '' ?>>
            <?= $k->nama ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div>
      <label class="block">Bobot</label>
      <input type="number" name="bobot" value="<?= isset($bobot) ? $bobot->bobot : '' ?>" class="w-full border rounded p-2" required>
    </div>
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
    <a href="<?= base_url('bobot') ?>" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</a>
  </form>
</div>
