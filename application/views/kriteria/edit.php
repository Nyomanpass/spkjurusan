<div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden w-full">
  <!-- Header -->
  <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white py-4 px-6">
    <h2 class="text-xl font-bold text-center">Edit Kriteria</h2>
  </div>

  <!-- Body -->
  <div class="p-6">
    <form method="post" action="<?= base_url('kriteria/edit/'.$kriteria['id_kriteria']) ?>" class="space-y-5">
      <!-- hidden id -->
      <input type="hidden" name="id_kriteria" value="<?= $kriteria['id_kriteria'] ?>">

      <!-- Kode -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Kode</label>
        <input type="text" name="kode" value="<?= $kriteria['kode'] ?>" required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition">
      </div>

      <!-- Nama -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
        <input type="text" name="nama" value="<?= $kriteria['nama'] ?>" required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition">
      </div>

      <!-- Sifat -->
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Sifat</label>
        <select name="sifat" required
          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition">
          <option value="benefit" <?= $kriteria['sifat'] == 'benefit' ? 'selected' : '' ?>>Benefit</option>
          <option value="cost" <?= $kriteria['sifat'] == 'cost' ? 'selected' : '' ?>>Cost</option>
        </select>
      </div>

      <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Type Range</label>
          <select name="type_range" required
              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition">
              <option value="">-- Pilih Tipe Range --</option>
              <option value="mapel" <?= $kriteria['type_range'] == 'mapel' ? 'selected' : '' ?>>Mapel (Akademik)</option>
              <option value="prestasi" <?= $kriteria['type_range'] == 'prestasi' ? 'selected' : '' ?>>Prestasi</option>
              <option value="wawancara" <?= $kriteria['type_range'] == 'wawancara' ? 'selected' : '' ?>>Wawancara / IQ</option>
          </select>
          <p class="text-xs text-gray-500 mt-1">*Menentukan model perhitungan keterangan nilai secara otomatis.</p>
      </div>

      <!-- Tombol -->
      <div class="flex justify-end gap-3 pt-4 border-t">
        <a href="<?= base_url('kriteria') ?>"
          class="px-5 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
          Batal
        </a>
        <button type="submit"
          class="px-6 py-2 rounded-lg bg-yellow-600 text-white font-semibold hover:bg-yellow-700 shadow transition">
          Update
        </button>
      </div>
    </form>
  </div>
</div>
