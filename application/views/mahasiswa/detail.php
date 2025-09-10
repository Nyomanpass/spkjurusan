<?php if($this->session->flashdata('success')): ?>
<div class="max-w-4xl mx-auto p-4 mb-4 bg-green-100 text-green-700 rounded">
    <?= $this->session->flashdata('success') ?>
</div>
<?php endif; ?>

<!-- Detail Mahasiswa -->
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Detail Mahasiswa</h2>
    <?php if($mahasiswa): ?>
        <p><b>Nama:</b> <?= htmlspecialchars($mahasiswa['nama_siswa']) ?></p>
        <p><b>NIM:</b> <?= htmlspecialchars($mahasiswa['nisn']) ?></p>
    <?php else: ?>
        <p>Data mahasiswa tidak ditemukan.</p>
    <?php endif; ?>
</div>

<!-- Input Data Raport -->
<div class="max-w-4xl mx-auto mt-6 p-6 bg-white rounded-lg shadow-md">
    <h3 class="text-xl font-semibold mb-4">Input Data Raport</h3>
    <form method="post" class="space-y-4">
    <input type="hidden" name="submit_raport" value="1">
    <?php if(!empty($mata_pelajaran)): ?>
        <?php foreach($mata_pelajaran as $mp): ?>
            <?php 
                $existing = null;
                if (!empty($raport)) {
                    foreach ($raport as $r) {
                        if ($r['mapel_id'] == $mp['id_mapel']) {
                            $existing = $r;
                            break;
                        }
                    }
                }
            ?>
            <div class="mb-4">
                <label class="block font-medium">
                    <?= htmlspecialchars($mp['nama_mapel']) ?>
                </label>

                <input type="number" 
                    name="pengetahuan[<?= $mp['id_mapel'] ?>]" 
                    value="<?= $existing ? $existing['pengetahuan'] : '' ?>"
                    class="w-full border rounded p-2 mb-1" 
                    placeholder="Nilai Pengetahuan" required>

                <small class="text-gray-500">Pengetahuan</small>

                <input type="number" 
                    name="keterampilan[<?= $mp['id_mapel'] ?>]" 
                    value="<?= $existing ? $existing['keterampilan'] : '' ?>"
                    class="w-full border rounded p-2 mt-2 mb-1" 
                    placeholder="Nilai Keterampilan" required>

                <small class="text-gray-500">Keterampilan</small>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada mata pelajaran.</p>
    <?php endif; ?>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan Raport
    </button>
</form>

</div>



<div class="max-w-4xl mx-auto mt-6 p-6 bg-white rounded-lg shadow-md">
    <h3 class="text-xl font-semibold mb-4">
        <?= $edit_prestasi ? "Edit Prestasi" : "Input Prestasi" ?>
    </h3>
    <form method="post" class="space-y-4">
        <input type="hidden" name="submit_prestasi" value="1">
        <?php if($edit_prestasi): ?>
            <input type="hidden" name="id_prestasi" value="<?= $edit_prestasi['id_prestasi'] ?>">
        <?php endif; ?>

        <div>
            <label class="block font-medium">Jenis Prestasi</label>
            <input type="text" name="jenis_prestasi" class="w-full border rounded p-2"
                   value="<?= $edit_prestasi['jenis_prestasi'] ?? '' ?>" required>
        </div>

        <div>
            <label class="block font-medium">Tingkat</label>
            <select name="tingkat" class="w-full border rounded p-2">
                <?php 
                $tingkatan = ["Kabupaten","Provinsi","Nasional","Internasional"];
                foreach($tingkatan as $t): ?>
                    <option value="<?= $t ?>" 
                        <?= isset($edit_prestasi) && $edit_prestasi['tingkat'] == $t ? 'selected' : '' ?>>
                        <?= $t ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label class="block font-medium">Juara</label>
            <input type="text" name="juara" class="w-full border rounded p-2"
                   value="<?= $edit_prestasi['juara'] ?? '' ?>" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
            <?= $edit_prestasi ? "Update Prestasi" : "Simpan Prestasi" ?>
        </button>
    </form>
</div>


<div class="max-w-4xl mx-auto mt-6 p-6 bg-white rounded-lg shadow-md">
    <h3 class="text-xl font-semibold mb-4">
        <?= $edit_tes ? "Edit Tes" : "Input Tes" ?>
    </h3>
    <form method="post" class="space-y-4">
        <input type="hidden" name="submit_tes" value="1">

        <!-- selalu kirim id_mahasiswa -->
        <input type="hidden" name="id_mahasiswa" value="<?= $id_mahasiswa ?>">

        <?php if($edit_tes): ?>
            <input type="hidden" name="id_tes" value="<?= $edit_tes['id_tes'] ?>">
        <?php endif; ?>

        <div>
            <label class="block font-medium">Nilai IQ</label>
            <input type="number" name="iq" class="w-full border rounded p-2"
                   value="<?= $edit_tes['iq'] ?? '' ?>" required>
        </div>

        <div>
            <label class="block font-medium">Nilai Wawancara</label>
            <input type="number" name="wawancara" class="w-full border rounded p-2"
                   value="<?= $edit_tes['wawancara'] ?? '' ?>" required>
        </div>

        <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded">
            <?= $edit_tes ? "Update Tes" : "Simpan Tes" ?>
        </button>
    </form>
</div>



<!-- Data Raport -->
<div class="max-w-4xl mx-auto mt-6 p-6 bg-white rounded-lg shadow-md">
    <h3 class="text-xl font-semibold mb-4">Data Raport</h3>
    <?php if(!empty($raport)): ?>
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Mapel</th>
                    <th class="border p-2">Pengetahuan</th>
                    <th class="border p-2">Keterampilan</th>
                    <th class="border p-2">Nilai Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($raport as $r): ?>
                <tr>
                    <td class="border p-2"><?= htmlspecialchars($r['nama_mapel']) ?></td>
                    <td class="border p-2"><?= htmlspecialchars($r['pengetahuan']) ?></td>
                    <td class="border p-2"><?= htmlspecialchars($r['keterampilan']) ?></td>
                    <td class="border p-2"><?= htmlspecialchars($r['nilai_akhir']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Belum ada data raport.</p>
    <?php endif; ?>
</div>


<div class="max-w-4xl mx-auto mt-6 p-6 bg-white rounded-lg shadow-md">
    <h3 class="text-xl font-semibold mb-4">Data Prestasi</h3>
    <?php if(!empty($prestasi)): ?>
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">Jenis</th>
                    <th class="border p-2">Tingkat</th>
                    <th class="border p-2">Juara</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prestasi as $p): ?>
                <tr>
                    <td class="border p-2"><?= htmlspecialchars($p['jenis_prestasi']) ?></td>
                    <td class="border p-2"><?= htmlspecialchars($p['tingkat']) ?></td>
                    <td class="border p-2"><?= htmlspecialchars($p['juara']) ?></td>
                    <td class="border p-2 text-center">
                        <a href="<?= base_url('mahasiswa/detail/'.$id_mahasiswa.'/prestasi/'.$p['id_prestasi']) ?>" ...>Edit</a>
                        <a href="<?= base_url('mahasiswa/delete_prestasi/'.$p['id_prestasi'].'/'.$id_mahasiswa) ?>" 
                           onclick="return confirm('Yakin hapus data ini?')" 
                           class="bg-red-600 text-white px-2 py-1 rounded">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Belum ada data prestasi.</p>
    <?php endif; ?>
</div>

<!-- data testing -->
<div class="max-w-4xl mx-auto mt-6 p-6 bg-white rounded-lg shadow-md">
    <h3 class="text-xl font-semibold mb-4">Data Tes</h3>
    <?php if (!empty($tes)): ?>
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">IQ</th>
                    <th class="border p-2">Wawancara</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tes as $row): ?>
                <tr>
                    <td class="border p-2"><?= htmlspecialchars($row['iq'] ?? '') ?></td>
                    <td class="border p-2"><?= htmlspecialchars($row['wawancara'] ?? '') ?></td>
                    <td class="border p-2 text-center">
                        <a href="<?= base_url('mahasiswa/detail/'.$id_mahasiswa.'/tes/'.$row['id_tes']) ?>">Edit</a>
                        <a href="<?= base_url('mahasiswa/delete_tes/'.($row['id_tes'] ?? '').'/'.$id_mahasiswa) ?>" 
                           onclick="return confirm('Yakin hapus data ini?')" 
                           class="bg-red-600 text-white px-2 py-1 rounded">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Belum ada data tes.</p>
    <?php endif; ?>
</div>


<div class="mt-4">
    <form method="post" action="<?= base_url('mahasiswa/prosesChip/'.$mahasiswa['id_mahasiswa']) ?>">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Hitung Nilai Chip
        </button>
    </form>
</div>



