<div class="p-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Tabel Nilai Alternatif</h2>
        <a href="<?= base_url('mahasiswa/normalisasi') ?>" 
           class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
           Lihat Normalisasi
        </a>
    </div>

    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Kode Siswa</th>
                    <th class="px-4 py-2">C1</th>
                    <th class="px-4 py-2">C2</th>
                    <th class="px-4 py-2">C3</th>
                    <th class="px-4 py-2">C4</th>
                    <th class="px-4 py-2">C7</th>
                    <th class="px-4 py-2">C8</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($alternatif as $id => $row): ?>
                <tr class="odd:bg-white even:bg-gray-50 hover:bg-green-50 transition">
                    <td class="border px-4 py-2 font-medium text-gray-800">
                        <?= $row['nama_siswa']; ?>
                    </td>
                    <td class="border px-4 py-2"><?= $row['C1'] ?? '-'; ?></td>
                    <td class="border px-4 py-2"><?= $row['C2'] ?? '-'; ?></td>
                    <td class="border px-4 py-2"><?= $row['C3'] ?? '-'; ?></td>
                    <td class="border px-4 py-2"><?= $row['C4'] ?? '-'; ?></td>
                    <td class="border px-4 py-2"><?= $row['C7'] ?? '-'; ?></td>
                    <td class="border px-4 py-2"><?= $row['C8'] ?? '-'; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
