<h1 class="text-2xl font-bold mb-4">Data Mahasiswa</h1>
<a href="<?= base_url('mahasiswa/create') ?>" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Mahasiswa</a>

<table class="w-full bg-white rounded shadow">
  <thead>
    <tr class="bg-gray-200">
      <th class="p-2">NISN</th>
      <th class="p-2">Nama</th>
      <th class="p-2">Tempat Lahir</th>
      <th class="p-2">Tanggal Lahir</th>
      <th class="p-2">Alamat</th>
      <th class="p-2">No Telepon</th>
      <th class="p-2">Jurusan</th>
      <th class="p-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($mahasiswa as $m): ?>
    <tr class="border-b">
      <td class="p-2"><?= $m['nisn'] ?></td>
      <td class="p-2"><?= $m['nama_siswa'] ?></td>
      <td class="p-2"><?= $m['tempat_lahir'] ?></td>
      <td class="p-2"><?= $m['tanggal_lahir'] ?></td>
      <td class="p-2"><?= $m['alamat'] ?></td>
      <td class="p-2"><?= $m['no_telepon'] ?></td>
      <td class="p-2"><?= $m['jurusan_sekarang'] ?></td>
      <td class="p-2 space-x-2">
            <a href="<?= base_url('mahasiswa/detail/'.$m['id_mahasiswa']) ?>" 
            class="bg-green-600 text-white px-2 py-1 rounded hover:bg-green-700">Detail</a>
            <a href="<?= base_url('mahasiswa/edit/'.$m['id_mahasiswa']) ?>" 
            class="bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700">Edit</a>
            <a href="<?= base_url('mahasiswa/delete/'.$m['id_mahasiswa']) ?>" 
            onclick="return confirm('Hapus data ini?')" 
            class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700">Hapus</a>
            <a href="<?= base_url('mahasiswa/preferensi/'.$m['id_mahasiswa']) ?>" 
            class="bg-purple-600 text-white px-2 py-1 rounded hover:bg-purple-700">Rekomendasi</a>
        </td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
