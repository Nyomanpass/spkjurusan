<!--back button-->
<div class="max-w-3xl mx-auto ">
  <a href="<?= base_url('mahasiswa') ?>" class="inline-block mb-4 text-black hover:text-blue-600 font-semibold">
    &larr; Kembali ke Daftar Mahasiswa
  </a>
</div>

<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-lg">
  <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-4 text-center">Edit Mahasiswa</h1>

  <form method="post" action="<?= base_url('mahasiswa/update/' . $mahasiswa['id_mahasiswa']) ?>" class="space-y-6">
    <?php $fields = ['nisn' => 'NISN', 'nama_siswa' => 'Nama Siswa', 'tempat_lahir' => 'Tempat Lahir', 'tanggal_lahir' => 'Tanggal Lahir', 'alamat' => 'Alamat', 'no_telepon' => 'No Telepon', 'jurusan_sekarang' => 'Jurusan Sekarang']; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <?php foreach ($fields as $key => $label): ?>
        <div class="<?= $key == 'alamat' ? 'md:col-span-2' : '' ?>">
          <label class="block text-sm font-semibold text-gray-700 mb-2"><?= $label ?></label>
          <?php if ($key == 'alamat'): ?>
            <textarea name="<?= $key ?>" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-none" rows="4"><?= $mahasiswa[$key] ?></textarea>
          <?php elseif ($key == 'tanggal_lahir'): ?>
            <input type="date" name="<?= $key ?>" value="<?= $mahasiswa[$key] ?>" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
          <?php else: ?>
            <input type="text" name="<?= $key ?>" value="<?= $mahasiswa[$key] ?>" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200">
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>


    <div class="pt-4">
      <button type="submit"
        class="w-full bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-md transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
        Update Data
      </button>
    </div>
  </form>
</div>