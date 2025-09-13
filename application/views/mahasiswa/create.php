<div class="max-w-2xl mx-auto p-6 bg-white">
  <h1 class="text-3xl font-bold text-gray-800 pb-4 text-center">Tambah Mahasiswa</h1>

  <div class="border-t border-gray-300 p-6">
    <form method="post" action="<?= base_url('mahasiswa/store') ?>" class="space-y-6">
      <?php $fields = [
        'nisn' => 'NISN',
        'nama_siswa' => 'Nama Siswa',
        'tempat_lahir' => 'Tempat Lahir',
        'tanggal_lahir' => 'Tanggal Lahir',
        'alamat' => 'Alamat',
        'no_telepon' => 'No Telepon',
        'jurusan_sekarang' => 'Jurusan Sekarang'
      ]; ?>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach ($fields as $key => $label): ?>
          <div class="<?= ($key == 'alamat') ? 'md:col-span-2' : '' ?>">
            <label class="block text-sm font-semibold text-gray-700 mb-2"><?= $label ?></label>
            <?php if ($key == 'alamat'): ?>
              <textarea name="<?= $key ?>" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                rows="3" placeholder="Masukkan alamat lengkap"></textarea>
            <?php elseif ($key == 'tanggal_lahir'): ?>
              <input type="date" name="<?= $key ?>" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200">
            <?php else: ?>
              <input type="text" name="<?= $key ?>" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200"
                placeholder="Masukkan <?= strtolower($label) ?>">
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="flex justify-end pt-4">
        <button type="submit"
          class="bg-green-600 hover:bg-green-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transform transition duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
          Simpan Data
        </button>
      </div>
    </form>
  </div>
</div>