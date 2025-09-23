<div class="max-w-3xl bg-white mx-auto rounded-2xl shadow-lg overflow-hidden">
  <!-- Header -->
  <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-4 px-6">
    <h2 class="text-xl font-bold text-center">Edit Mahasiswa</h2>
  </div>

  <!-- Form -->
  <div class="p-6">
    <form method="post" action="<?= base_url('mahasiswa/update/' . $mahasiswa['id_mahasiswa']) ?>" class="space-y-6">
      <?php
      $fields = [
        'nisn' => 'NISN',
        'nama_siswa' => 'Nama Siswa',
        'tempat_lahir' => 'Tempat Lahir',
        'tanggal_lahir' => 'Tanggal Lahir',
        'alamat' => 'Alamat',
        'no_telepon' => 'No Telepon',
        'jurusan_sekarang' => 'Jurusan Sekarang'
      ];
      ?>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-h-[calc(90vh-200px)] overflow-y-auto">
        <?php foreach ($fields as $key => $label): ?>
          <div class="<?= ($key == 'alamat') ? 'md:col-span-2' : '' ?>">
            <label class="block text-sm font-semibold text-gray-700 mb-2"><?= $label ?></label>

            <?php if ($key == 'alamat'): ?>
              <textarea name="<?= $key ?>" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 hover:border-blue-400"
                rows="3"><?= $mahasiswa[$key] ?></textarea>

            <?php elseif ($key == 'tanggal_lahir'): ?>
              <input type="date" name="<?= $key ?>" value="<?= $mahasiswa[$key] ?>" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 hover:border-blue-400">

            <?php else: ?>
              <input type="text" name="<?= $key ?>" value="<?= $mahasiswa[$key] ?>" required
                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 hover:border-blue-400"
                placeholder="Masukkan <?= strtolower($label) ?>">
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Tombol Aksi -->
      <div class="flex justify-end gap-3 pt-6 border-t">
        <a href="<?= base_url('mahasiswa') ?>"
          class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition duration-200">
          Batal
        </a>
        <button type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transform transition duration-200 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
          Update Data
        </button>
      </div>
    </form>
  </div>
</div>