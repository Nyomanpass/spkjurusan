<h1 class="text-2xl font-bold mb-4">Tambah Mahasiswa</h1>

<form method="post" action="<?= base_url('mahasiswa/store') ?>" class="space-y-4">
  <?php $fields = ['nisn'=>'NISN','nama_siswa'=>'Nama Siswa','tempat_lahir'=>'Tempat Lahir','tanggal_lahir'=>'Tanggal Lahir','alamat'=>'Alamat','no_telepon'=>'No Telepon','jurusan_sekarang'=>'Jurusan Sekarang']; ?>
  <?php foreach($fields as $key=>$label): ?>
    <div>
      <label class="block text-gray-700"><?= $label ?></label>
      <?php if($key == 'alamat'): ?>
        <textarea name="<?= $key ?>" required class="w-full border rounded px-3 py-2"></textarea>
      <?php elseif($key == 'tanggal_lahir'): ?>
        <input type="date" name="<?= $key ?>" required class="w-full border rounded px-3 py-2">
      <?php else: ?>
        <input type="text" name="<?= $key ?>" required class="w-full border rounded px-3 py-2">
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
  <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
