<div class="min-h-screen">
    <div class="">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-1">Tabel Nilai Alternatif</h2>
                <p class="text-gray-600 text-sm">Data nilai alternatif untuk analisis keputusan</p>
            </div>
            <a href="<?= base_url('siswa/normalisasi') ?>"
                class="inline-flex items-center px-5 py-2.5 bg-green-600 text-white text-sm font-medium rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                Lihat Normalisasi
            </a>
        </div>

        <!-- Table Container -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-green-600 to-green-700">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                Kode Siswa
                            </th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                C1
                            </th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                C2
                            </th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                C3
                            </th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                C4
                            </th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                C7
                            </th>
                            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">
                                C8
                            </th>
                        </tr>
                    </thead>
                   <tbody class="bg-white divide-y divide-gray-200">
    <?php foreach ($alternatif as $id => $row): ?>
        <tr class="hover:bg-green-50 transition-colors duration-150">

            <!-- Nama Siswa -->
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-8 w-8">
                        <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center">
                            <span class="text-sm font-medium text-green-600">
                                <?= substr($row['nama_siswa'], 0, 1); ?>
                            </span>
                        </div>
                    </div>
                    <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900">
                            <?= $row['nama_siswa']; ?>
                        </div>
                    </div>
                </div>
            </td>

            <!-- C1 -->
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="font-semibold text-gray-900"><?= $row['C1'] ?? '-' ?></div>
                <div class="text-xs text-green-700"><?= $row['C1_ket'] ?? '-' ?></div>
            </td>

            <!-- C2 -->
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="font-semibold text-gray-900"><?= $row['C2'] ?? '-' ?></div>
                <div class="text-xs text-green-700"><?= $row['C2_ket'] ?? '-' ?></div>
            </td>

            <!-- C3 -->
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="font-semibold text-gray-900"><?= $row['C3'] ?? '-' ?></div>
                <div class="text-xs text-green-700"><?= $row['C3_ket'] ?? '-' ?></div>
            </td>

            <!-- C4 -->
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="font-semibold text-gray-900"><?= $row['C4'] ?? '-' ?></div>
                <div class="text-xs text-green-700"><?= $row['C4_ket'] ?? '-' ?></div>
            </td>

            <!-- C7 -->
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="font-semibold text-gray-900"><?= $row['C7'] ?? '-' ?></div>
                <div class="text-xs text-green-700"><?= $row['C7_ket'] ?? '-' ?></div>
            </td>

            <!-- C8 -->
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="font-semibold text-gray-900"><?= $row['C8'] ?? '-' ?></div>
                <div class="text-xs text-green-700"><?= $row['C8_ket'] ?? '-' ?></div>
            </td>

        </tr>
    <?php endforeach; ?>
</tbody>

                </table>
            </div>
        </div>
    </div>
</div>