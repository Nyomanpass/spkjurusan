<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
  <h2 class="text-lg font-bold mb-4 text-gray-800">Edit Mata Pelajaran</h2>
  <form method="post" action="<?= base_url('mataPelajaran/edit/'.$mapel['id_mapel']) ?>" class="space-y-4">
    <div>
      <label class="block text-sm font-medium text-gray-700">Nama Mapel</label>
      <input type="text" name="nama_mapel" value="<?= $mapel['nama_mapel'] ?>" required class="w-full border rounded-lg px-3 py-2">
    </div>
    <div class="flex justify-end space-x-2">
      <a href="<?= base_url('mataPelajaran') ?>" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</a>
      <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700">Simpan</button>
    </div>
  </form>
</div>
