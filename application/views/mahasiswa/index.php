<div class="p-6">

  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">Data Siswa</h2>
    <a href="<?= base_url('mahasiswa/create') ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">+ Tambah</a>
  </div>

  <div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full min-w-max">
        <thead>
          <tr class="bg-gray-50 border-b border-gray-200">
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 whitespace-nowrap">NISN</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 whitespace-nowrap">Nama</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 whitespace-nowrap">Tempat Lahir</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 whitespace-nowrap">Tanggal Lahir</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 whitespace-nowrap">Alamat</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 whitespace-nowrap">No Telepon</th>
            <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 whitespace-nowrap">Jurusan</th>
            <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700 whitespace-nowrap">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php foreach ($mahasiswa as $m): ?>
            <tr class="hover:bg-gray-50 transition-colors">
              <td class="px-4 py-3 text-sm text-gray-900 whitespace-nowrap"><?= $m['nisn'] ?></td>
              <td class="px-4 py-3 text-sm font-medium text-gray-900 whitespace-nowrap"><?= $m['nama_siswa'] ?></td>
              <td class="px-4 py-3 text-sm text-gray-700 whitespace-nowrap"><?= $m['tempat_lahir'] ?></td>
              <td class="px-4 py-3 text-sm text-gray-700 whitespace-nowrap"><?= $m['tanggal_lahir'] ?></td>
              <td class="px-4 py-3 text-sm text-gray-700 whitespace-nowrap"><?= $m['alamat'] ?></td>
              <td class="px-4 py-3 text-sm text-gray-700 whitespace-nowrap"><?= $m['no_telepon'] ?></td>
              <td class="px-4 py-3 text-sm text-gray-700 whitespace-nowrap"><?= $m['jurusan_sekarang'] ?></td>
              <td class="px-4 py-3 text-center whitespace-nowrap">
                <div class="flex justify-center space-x-2">
                  <a href="<?= base_url('mahasiswa/detail/' . $m['id_mahasiswa']) ?>"
                    class="text-blue-600 hover:text-blue-800 text-sm font-medium transition-colors">Detail</a>
                  <span class="text-gray-300">|</span>
                  <a href="<?= base_url('mahasiswa/edit/' . $m['id_mahasiswa']) ?>"
                    class="text-gray-600 hover:text-gray-800 text-sm font-medium transition-colors">Edit</a>
                  <span class="text-gray-300">|</span>
                  <a href="<?= base_url('mahasiswa/delete/' . $m['id_mahasiswa']) ?>"
                    onclick="return confirm('Hapus data ini?')"
                    class="text-red-600 hover:text-red-800 text-sm font-medium transition-colors">Hapus</a>
                  <span class="text-gray-300">|</span>
                  <a href="<?= base_url('mahasiswa/preferensi/' . $m['id_mahasiswa']) ?>"
                    class="text-indigo-600 hover:text-indigo-800 text-sm font-medium transition-colors">Rekomendasi</a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>