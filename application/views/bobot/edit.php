<div class="max-w-lg mx-auto">
  <a href="<?= base_url('bobot') ?>" class="inline-block mb-4 text-black hover:text-blue-600 font-semibold">
    &larr; Kembali ke Daftar Bobot
  </a>
</div>


<div class="p-6 max-w-lg mx-auto bg-white rounded-lg shadow">
  <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Bobot</h1>
  <form method="post" class="space-y-4">

    <!-- Pilih Jurusan -->
    <div>
      <label class="block font-medium mb-1">Jurusan</label>
      <select name="id_jurusan" class="w-full border rounded p-2">
        <?php foreach ($jurusan as $j): ?>
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
        <?php foreach ($kriteria as $k): ?>
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
    <div class="pt-4">
      <button type="submit"
        class="w-full bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2 rounded-md transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
        Simpan
      </button>
    </div>
  </form>
</div>