<div class="p-6 max-w-md mx-auto">
  <h2 class="text-2xl font-bold mb-4">Tambah Kriteria</h2>
  <form method="post">
    <label class="block mb-2">Kode</label>
    <input type="text" name="kode" class="w-full border px-3 py-2 mb-3">

    <label class="block mb-2">Nama</label>
    <input type="text" name="nama" class="w-full border px-3 py-2 mb-3">

    <label class="block mb-2">Sifat</label>
    <select name="sifat" class="w-full border px-3 py-2 mb-3">
      <option value="benefit">Benefit</option>
      <option value="cost">Cost</option>
    </select>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
  </form>
</div>
