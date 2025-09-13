<!--back button--->
<a href="<?= base_url('mahasiswa') ?>" class="inline-block mb-4 text-black hover:text-blue-600 font-semibold">
    &larr; Kembali ke Daftar Mahasiswa
</a>

<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-3">
        Hasil Preferensi Siswa: <?= $mahasiswa['nama_siswa']; ?>
    </h2>

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
                    <tr class="<?= $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' ?> hover:bg-blue-50 transition-colors">
                        <td class="border border-gray-300 px-6 py-4 text-gray-700"><?= $row['jurusan']; ?></td>
                        <td class="border border-gray-300 px-6 py-4 text-center">
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full font-medium">
                                <?= number_format($row['nilai'], 3); ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>