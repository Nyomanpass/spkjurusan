<div class="p-6 max-w-md mx-auto">
  <h2 class="text-2xl font-bold mb-4">Edit Kriteria</h2>
  <form method="post">
    <label class="block mb-2">Kode</label>
    <input type="text" name="kode" value="<?= $kriteria->kode ?>" class="w-full border px-3 py-2 mb-3">

    <label class="block mb-2">Nama</label>
    <input type="text" name="nama" value="<?= $kriteria->nama ?>" class="w-full border px-3 py-2 mb-3">

    <label class="block mb-2">Sifat</label>
    <select name="sifat" class="w-full border px-3 py-2 mb-3">
      <option value="benefit" <?= $kriteria->sifat=='benefit'?'selected':'' ?>>Benefit</option>
      <option value="cost" <?= $kriteria->sifat=='cost'?'selected':'' ?>>Cost</option>
    </select>

    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
  </form>
</div>
