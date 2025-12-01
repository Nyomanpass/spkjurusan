<div class="min-h-screen">
  <div class="">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
      <div class="text-left">
        <h2 class="text-2xl font-bold text-gray-800 mb-1">Tabel Data Siswa</h2>
        <p class="text-gray-600 text-sm">Daftar siswa yang terdaftar di sistem</p>
      </div>

      <a onclick="document.getElementById('modalSiswa').classList.remove('hidden')"
        class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200">
        + Tambah
      </a>




    </div>

    <!-- Table Container -->
    <div class="rounded-xl overflow-hidden">
      <input id="searchInput" type="text" placeholder="Cari nama siswa..."
        class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition w-full sm:w-1/2 mb-4">
      <div class="overflow-x-auto">
        <table id="siswaTable" class="rounded-xl overflow-hidden min-w-full divide-y divide-gray-200">
          <thead class="bg-gradient-to-r from-blue-600 to-blue-700">
            <tr>
              <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                Nama
              </th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                Alamat
              </th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                No Telepon
              </th>
              <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">
                Aksi
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php foreach ($siswa as $m): ?>
              <tr class="hover:bg-blue-50 transition-colors duration-150">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                  <?= $m['nama_siswa'] ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                  <?= $m['alamat'] ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                  <?= $m['no_telepon'] ?>
                </td>
                <!-- <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                  <div class="flex justify-center space-x-3">
                    <a href="<?= base_url('siswa/detail/' . $m['id_siswa']) ?>" class="text-blue-600 hover:text-blue-800" title="Detail">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?= base_url('siswa/edit/' . $m['id_siswa']) ?>" class="text-gray-600 hover:text-gray-800" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= base_url('siswa/delete/' . $m['id_siswa']) ?>" onclick="return confirm('Hapus data ini?')" class="text-red-600 hover:text-red-800" title="Hapus">
                      <i class="fas fa-trash"></i>
                    </a>

                    <a href="<?= base_url('siswa/preferensi/' . $m['id_siswa']) ?>" class="text-indigo-600 hover:text-indigo-800" title="Rekomendasi">
                      <i class="fas fa-star"></i>
                    </a>
                  </div>
                </td> -->
                </td>
                <td class="px-4 py-3 text-center">
                  <div class="flex justify-center space-x-2">
                    <a href="<?= base_url('siswa/detail/' . $m['id_siswa']) ?>"
                      class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md text-xs transition duration-200 flex items-center">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a onclick="document.getElementById('modalEdit<?= $m['id_siswa'] ?>').classList.remove('hidden')"
                      class="px-3 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xs transition duration-200 flex items-center">
                      <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                    <a href="<?= base_url('siswa/delete/' . $m['id_siswa']) ?>"
                      onclick="return confirm('Yakin ingin menghapus data ini?')"
                      class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs transition duration-200 flex items-center">
                      <i class="fas fa-trash mr-1"></i>Hapus
                    </a>
                  </div>
                </td>
              </tr>

              <div id="modalEdit<?= $m['id_siswa'] ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
                <div class="rounded-xl w-full max-w-2xl p-6 relative">
                  <?php $this->load->view('siswa/edit', ['siswa' => $m]); ?>
                </div>
              </div>

            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div id="modalSiswa" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/75">
  <div class="rounded-xl w-full max-w-2xl  p-6 relative">
    <?php $this->load->view('siswa/create'); ?>
  </div>
</div>

<script>
  const searchInput = document.getElementById('searchInput');
  const table = document.getElementById('siswaTable').getElementsByTagName('tbody')[0];

  searchInput.addEventListener('keyup', function() {
    const filter = searchInput.value.toLowerCase();
    const rows = table.getElementsByTagName('tr');

    for (let i = 0; i < rows.length; i++) {
      const nama = rows[i].getElementsByTagName('td')[0].textContent.toLowerCase();
      const alamat = rows[i].getElementsByTagName('td')[1].textContent.toLowerCase();
      const noTelp = rows[i].getElementsByTagName('td')[2].textContent.toLowerCase();
      if (nama.includes(filter) || alamat.includes(filter) || noTelp.includes(filter)) {
        rows[i].style.display = '';
      } else {
        rows[i].style.display = 'none';
      }
    }
  });
</script>