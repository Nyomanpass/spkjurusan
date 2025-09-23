<div class="min-h-screen">
  <div class="max-w-6xl mx-auto">
    <!-- Tombol Kembali -->
    <div class="mb-4">
      <a href="<?= base_url('mahasiswa/alternatif') ?>" 
        class="inline-flex items-center px-5 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-md transition duration-200">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
      </a>
    </div>

    <!-- Tabel Normalisasi -->
    <div class="overflow-x-auto bg-white rounded-xl shadow-md">
      <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
        <thead class="bg-green-600 text-white">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold">Nama Siswa</th>
            <th class="px-6 py-3 text-center text-sm font-semibold">C1</th>
            <th class="px-6 py-3 text-center text-sm font-semibold">C2</th>
            <th class="px-6 py-3 text-center text-sm font-semibold">C3</th>
            <th class="px-6 py-3 text-center text-sm font-semibold">C4</th>
            <th class="px-6 py-3 text-center text-sm font-semibold">C7</th>
            <th class="px-6 py-3 text-center text-sm font-semibold">C8</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php foreach ($normalisasi as $row): ?>
            <tr class="odd:bg-white even:bg-gray-50 hover:bg-green-50 transition duration-150">
              <!-- Nama -->
              <td class="px-6 py-3 font-medium text-gray-800 whitespace-nowrap">
                <?= $row['nama'] ?>
              </td>
              <!-- Nilai Normalisasi -->
              <?php foreach ($row['normalisasi'] as $val): ?>
                <td class="px-6 py-3 text-center">
                  <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                    <?= number_format($val, 3) ?>
                  </span>
                </td>
              <?php endforeach; ?>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
