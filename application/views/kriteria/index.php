<div class="p-6">
  <h2 class="text-2xl font-bold mb-4">Data Kriteria</h2>
  <a href="<?= base_url('kriteria/tambah') ?>" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah</a>
  <table class="w-full border-collapse mt-4 border">
    <thead>
      <tr class="bg-gray-200">
        <th class="border px-4 py-2">ID</th>
        <th class="border px-4 py-2">Kode</th>
        <th class="border px-4 py-2">Nama</th>
        <th class="border px-4 py-2">Sifat</th>
        <th class="border px-4 py-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($kriteria as $row): ?>
      <tr>
        <td class="border px-4 py-2"><?= $row->id_kriteria ?></td>
        <td class="border px-4 py-2"><?= $row->kode ?></td>
        <td class="border px-4 py-2"><?= $row->nama ?></td>
        <td class="border px-4 py-2"><?= $row->sifat ?></td>
        <td class="border px-4 py-2">
          <a href="<?= base_url('kriteria/edit/'.$row->id_kriteria) ?>" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
          <a href="<?= base_url('kriteria/delete/'.$row->id_kriteria) ?>" class="bg-red-600 text-white px-2 py-1 rounded" onclick="return confirm('Hapus data ini?')">Delete</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
