<?php if (!empty($preferensi)): ?>
    <?php 
        // cari nilai tertinggi
        $maxNilai = max(array_column($preferensi, 'nilai')); 

        // urutkan preferensi dari nilai tertinggi ke terendah
        usort($preferensi, function($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });
    ?>

    <?php if (!empty($siswa)): ?>
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800">Hasil Preferensi untuk siswa</h2>
            <p class="text-gray-600">Nama: <span class="font-medium text-gray-900"><?= $siswa['nama_siswa']; ?></span></p>
            <p class="text-gray-600">NIM: <span class="font-medium text-gray-900"><?= $siswa['nisn']; ?></span></p>
        </div>
    <?php endif; ?>

    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse bg-white shadow-sm rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                <tr>
                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Jurusan</th>
                    <th class="border border-gray-300 px-6 py-3 text-center font-semibold">Nilai Preferensi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($preferensi as $index => $row): ?>
                    <?php $isMax = ($row['nilai'] == $maxNilai); ?>
                    <tr class="<?= $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' ?> hover:bg-blue-50 transition-colors">
                        <td class="border border-gray-300 px-6 py-4 text-gray-700">
                            <?= $row['jurusan']; ?>
                            <?php if ($isMax): ?>
                                <span class="ml-2 bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">
                                    Rekomendasi
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="border border-gray-300 px-6 py-4 text-center">
                            <span class="px-3 py-1 rounded-full font-medium
                                <?= $isMax ? 'bg-green-200 text-green-900' : 'bg-blue-100 text-blue-800' ?>">
                                <?= number_format($row['nilai'], 3); ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <p class="text-gray-500 italic">Preferensi belum dihitung untuk siswa ini.</p>
<?php endif; ?>
