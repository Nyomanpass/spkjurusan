<div class="p-6 max-w-lg mx-auto">
  <h1 class="text-xl font-bold mb-4">Edit Bobot</h1>
  <form method="post" class="space-y-4">
    
    <!-- Pilih Jurusan -->
    <div>
      <label class="block font-medium mb-1">Jurusan</label>
      <select name="id_jurusan" class="w-full border rounded p-2">
        <?php foreach($jurusan as $j): ?>
          <option value="<?= $j->id_jurusan ?>" <?= $bobot->id_jurusan == $j->id_jurusan ? 'selected' : '' ?>>
            <?= $j->nama ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Pilih Kriteria -->
    <div>
      <label class="block font-medium mb-1">Kriteria</label>
      <select name="id_kriteria" class="w-full border rounded p-2">
        <?php foreach($kriteria as $k): ?>
          <option value="<?= $k->id_kriteria ?>" <?= $bobot->id_kriteria == $k->id_kriteria ? 'selected' : '' ?>>
            <?= $k->nama ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <!-- Input Bobot -->
    <div>
      <label class="block font-medium mb-1">Bobot</label>
      <input 
        type="number" 
        name="bobot" 
        value="<?= $bobot->bobot ?>" 
        class="w-full border rounded p-2" 
        required>
    </div>

    <!-- Tombol -->
    <div class="flex gap-2">
      <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Update</button>
      <a href="<?= base_url('bobot') ?>" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</a>
    </div>
  </form>
</div>
