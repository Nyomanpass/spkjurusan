<div class="p-6">
  <h1 class="text-2xl font-bold mb-4">Data Bobot Jurusan</h1>
  <a href="<?= base_url('bobot/create') ?>" class="px-4 py-2 bg-blue-500 text-white rounded">+ Tambah Bobot</a>

  <?php 
  $currentJurusan = '';
  foreach ($bobot as $b): 
    if ($currentJurusan != $b->jurusan): 
      if ($currentJurusan != ''): ?>
          </tbody>
        </table>
      <?php endif; ?>
      
      <h2 class="text-xl font-semibold mt-6 mb-2 text-gray-700">Jurusan: <?= $b->jurusan ?></h2>
      <table class="w-full mb-4 border border-gray-200 shadow-md">
        <thead class="bg-gray-100">
          <tr>
            <th class="p-2 border">ID</th>
            <th class="p-2 border">Kriteria</th>
            <th class="p-2 border">Bobot</th>
            <th class="p-2 border">Aksi</th>
          </tr>
        </thead>
        <tbody>
    <?php 
      $currentJurusan = $b->jurusan;
    endif; 
    ?>
        <tr class="hover:bg-gray-50">
          <td class="p-2 border"><?= $b->id_bobot ?></td>
          <td class="p-2 border"><?= $b->kriteria ?></td>
          <td class="p-2 border"><?= $b->bobot ?></td>
          <td class="p-2 border">
            <a href="<?= base_url('bobot/edit/'.$b->id_bobot) ?>" class="px-2 py-1 bg-yellow-400 text-white rounded">Edit</a>
            <a href="<?= base_url('bobot/delete/'.$b->id_bobot) ?>" onclick="return confirm('Yakin hapus?')" class="px-2 py-1 bg-red-500 text-white rounded">Delete</a>
          </td>
        </tr>
  <?php endforeach; ?>
      </tbody>
    </table>
</div>
