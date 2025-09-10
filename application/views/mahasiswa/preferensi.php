<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Hasil Preferensi Mahasiswa ID: <?= $mahasiswa; ?></h2>

    <table class="table-auto border-collapse border border-gray-300 w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-3 py-2">Jurusan</th>
                <th class="border px-3 py-2">Nilai Preferensi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($preferensi as $row): ?>
                <tr>
                    <td class="border px-3 py-2"><?= $row['jurusan']; ?></td>
                    <td class="border px-3 py-2 text-center"><?= $row['nilai']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
