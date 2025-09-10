<table class="min-w-full border border-gray-300 rounded-lg overflow-hidden shadow-md">
    <a href="<?= base_url('mahasiswa/alternatif') ?>" 
           class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
           Kembali
        </a>
    <thead class="bg-green-600 text-white">
        <tr>
            <th class="px-4 py-2 text-left">Nama Siswa</th>
            <th class="px-4 py-2">C1</th>
            <th class="px-4 py-2">C2</th>
            <th class="px-4 py-2">C3</th>
            <th class="px-4 py-2">C4</th>
            <th class="px-4 py-2">C7</th>
            <th class="px-4 py-2">C8</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($normalisasi as $row): ?>
            <tr class="odd:bg-white even:bg-gray-50 hover:bg-green-50 transition">
                <td class="border px-4 py-2 font-medium text-gray-800">
                    <?= $row['nama'] ?>
                </td>
                <?php foreach ($row['normalisasi'] as $val): ?>
                    <td class="border px-4 py-2 text-gray-700">
                        <?= number_format($val, 3) ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
