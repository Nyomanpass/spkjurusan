<?php if ($this->session->flashdata('success')): ?>
    <div class="max-w-6xl mx-auto p-4 mb-6 bg-green-100 border border-green-400 text-green-700 rounded-lg">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <?= $this->session->flashdata('success') ?>
        </div>
    </div>
<?php endif; ?>

<div class="max-w-6xl mx-auto ">
    <a href="<?= base_url('mahasiswa') ?>" class="inline-block mb-4 text-black hover:text-blue-600 font-semibold">
        &larr; Kembali ke Daftar Mahasiswa
    </a>
</div>

<!-- Detail Mahasiswa -->
<div class="max-w-6xl mx-auto mb-6">
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-t-lg">
        <h1 class="text-3xl font-bold">Detail Mahasiswa</h1>
    </div>
    <div class="bg-white p-6 rounded-b-lg shadow-lg border border-gray-200">
        <?php if ($mahasiswa): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-600 mb-1">Nama Lengkap</p>
                    <p class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($mahasiswa['nama_siswa']) ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-600 mb-1">Nomor Induk Mahasiswa</p>
                    <p class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($mahasiswa['nisn']) ?></p>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-8">
                <p class="text-gray-500 text-lg">Data mahasiswa tidak ditemukan.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Grid Layout untuk Form -->
<div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6 ">

    <!-- Input Data Raport -->
    <div class="bg-white rounded-lg shadow-lg border border-gray-200">
        <div class=" text-green-600 border-b-4 border-gray-200 p-4 rounded-t-lg">
            <h3 class="text-xl font-semibold flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 001 1h6a1 1 0 001-1V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                </svg>
                Input Data Raport
            </h3>
        </div>
        <div class="p-6">
            <div class="max-h-96 overflow-y-auto">
                <form method="post" class="space-y-4">
                    <input type="hidden" name="submit_raport" value="1">
                    <?php if (!empty($mata_pelajaran)): ?>
                        <?php foreach ($mata_pelajaran as $mp): ?>
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
                            <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                                <h4 class="font-semibold text-gray-800 mb-3"><?= htmlspecialchars($mp['nama_mapel']) ?></h4>

                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nilai Pengetahuan</label>
                                        <input type="number"
                                            name="pengetahuan[<?= $mp['id_mapel'] ?>]"
                                            value="<?= $existing ? $existing['pengetahuan'] : '' ?>"
                                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                            placeholder="0-100" min="0" max="100" required>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nilai Keterampilan</label>
                                        <input type="number"
                                            name="keterampilan[<?= $mp['id_mapel'] ?>]"
                                            value="<?= $existing ? $existing['keterampilan'] : '' ?>"
                                            class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                            placeholder="0-100" min="0" max="100" required>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Simpan Data Raport
                        </button>
                    <?php else: ?>
                        <div class="text-center py-8">
                            <p class="text-gray-500">Tidak ada mata pelajaran tersedia.</p>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Input Prestasi -->
    <div class="bg-white rounded-lg shadow-lg border border-gray-200">
        <div class="text-green-600 border-b-4 border-black-200 p-4 rounded-t-lg">
            <h3 class="text-xl font-semibold flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <?= $edit_prestasi ? "Edit Prestasi" : "Input Prestasi" ?>
            </h3>
        </div>
        <div class="p-6">
            <form method="post" class="space-y-4">
                <input type="hidden" name="submit_prestasi" value="1">
                <?php if ($edit_prestasi): ?>
                    <input type="hidden" name="id_prestasi" value="<?= $edit_prestasi['id_prestasi'] ?>">
                <?php endif; ?>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Prestasi</label>
                    <input type="text" name="jenis_prestasi"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                        value="<?= $edit_prestasi['jenis_prestasi'] ?? '' ?>"
                        placeholder="Contoh: Olimpiade Matematika" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tingkat</label>
                    <select name="tingkat" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                        <?php
                        $tingkatan = ["Kabupaten", "Provinsi", "Nasional", "Internasional"];
                        foreach ($tingkatan as $t): ?>
                            <option value="<?= $t ?>"
                                <?= isset($edit_prestasi) && $edit_prestasi['tingkat'] == $t ? 'selected' : '' ?>>
                                <?= $t ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

               <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Juara</label>
                    <select name="juara"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                        required>
                        <option value="">-- Pilih Juara --</option>
                        <option value="1" <?= (isset($edit_prestasi['juara']) && $edit_prestasi['juara'] == 1) ? 'selected' : '' ?>>Juara 1</option>
                        <option value="2" <?= (isset($edit_prestasi['juara']) && $edit_prestasi['juara'] == 2) ? 'selected' : '' ?>>Juara 2</option>
                        <option value="3" <?= (isset($edit_prestasi['juara']) && $edit_prestasi['juara'] == 3) ? 'selected' : '' ?>>Juara 3</option>
                        <option value=">=4" <?= (isset($edit_prestasi['juara']) && $edit_prestasi['juara'] == '>=4') ? 'selected' : '' ?>>Juara ≥ 4</option>
                    </select>
                </div>


                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200">
                    <?= $edit_prestasi ? "Update Prestasi" : "Simpan Prestasi" ?>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Input Tes -->
<div class="max-w-6xl mx-auto mb-6">
    <div class="bg-white rounded-lg shadow-lg border border-gray-200">
        <div class="text-green-600 border-b-4 border-gray-200 p-4 rounded-t-lg">
            <h3 class="text-xl font-semibold flex items-center">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
                <?= $edit_tes ? "Edit Data Tes" : "Input Data Tes" ?>
            </h3>
        </div>
        <div class="p-6">
            <form method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <input type="hidden" name="submit_tes" value="1">
                <input type="hidden" name="id_mahasiswa" value="<?= $id_mahasiswa ?>">
                <?php if ($edit_tes): ?>
                    <input type="hidden" name="id_tes" value="<?= $edit_tes['id_tes'] ?>">
                <?php endif; ?>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nilai IQ</label>
                    <input type="number" name="iq"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        value="<?= $edit_tes['iq'] ?? '' ?>"
                        placeholder="0-200" min="0" max="200" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nilai Wawancara</label>
                    <input type="number" name="wawancara"
                        class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        value="<?= $edit_tes['wawancara'] ?? '' ?>"
                        placeholder="0-100" min="0" max="100" required>
                </div>

                <div class="md:col-span-2">
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-200">
                        <?= $edit_tes ? "Update Data Tes" : "Simpan Data Tes" ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Data Tables Section -->
<div class="max-w-6xl mx-auto space-y-6 mt-16">

    <!-- Data Raport -->
    <div class="bg-white rounded-lg shadow-lg border border-gray-200">
        <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white p-4 rounded-t-lg">
            <h3 class="text-xl font-semibold">📊 Data Raport</h3>
        </div>
        <div class="p-6">
            <?php if (!empty($raport)): ?>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="border border-gray-300 p-3 text-left font-semibold text-gray-700">Mata Pelajaran</th>
                                <th class="border border-gray-300 p-3 text-center font-semibold text-gray-700">Pengetahuan</th>
                                <th class="border border-gray-300 p-3 text-center font-semibold text-gray-700">Keterampilan</th>
                                <th class="border border-gray-300 p-3 text-center font-semibold text-gray-700">Nilai Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($raport as $r): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 p-3"><?= htmlspecialchars($r['nama_mapel']) ?></td>
                                    <td class="border border-gray-300 p-3 text-center">
                                        <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded"><?= htmlspecialchars($r['pengetahuan']) ?></span>
                                    </td>
                                    <td class="border border-gray-300 p-3 text-center">
                                        <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded"><?= htmlspecialchars($r['keterampilan']) ?></span>
                                    </td>
                                    <td class="border border-gray-300 p-3 text-center">
                                        <span class="inline-block bg-purple-100 text-purple-800 px-2 py-1 rounded font-semibold"><?= htmlspecialchars($r['nilai_akhir']) ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-8">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="text-gray-500 text-lg">Belum ada data raport tersimpan.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Data Prestasi -->
    <div class="bg-white rounded-lg shadow-lg border border-gray-200">
        <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white p-4 rounded-t-lg">
            <h3 class="text-xl font-semibold">🏆 Data Prestasi</h3>
        </div>
        <div class="p-6">
            <?php if (!empty($prestasi)): ?>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="border border-gray-300 p-3 text-left font-semibold text-gray-700">Jenis Prestasi</th>
                                <th class="border border-gray-300 p-3 text-center font-semibold text-gray-700">Tingkat</th>
                                <th class="border border-gray-300 p-3 text-center font-semibold text-gray-700">Juara</th>
                                <th class="border border-gray-300 p-3 text-center font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prestasi as $p): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 p-3"><?= htmlspecialchars($p['jenis_prestasi']) ?></td>
                                    <td class="border border-gray-300 p-3 text-center">
                                        <span class="inline-block bg-indigo-100 text-indigo-800 px-2 py-1 rounded text-sm"><?= htmlspecialchars($p['tingkat']) ?></span>
                                    </td>
                                    <td class="border border-gray-300 p-3 text-center">
                                        <span class="inline-block bg-yellow-100 text-yellow-800 px-2 py-1 rounded font-semibold"><?= htmlspecialchars($p['juara']) ?></span>
                                    </td>
                                    <td class="border border-gray-300 p-3 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="<?= base_url('mahasiswa/detail/' . $id_mahasiswa . '/prestasi/' . $p['id_prestasi']) ?>"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition duration-200">
                                                Edit
                                            </a>
                                            <a href="<?= base_url('mahasiswa/deletePrestasi/' . $p['id_prestasi'] . '/' . $id_mahasiswa) ?>"
                                                onclick="return confirm('Yakin hapus data ini?')"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition duration-200">
                                                Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-8">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <p class="text-gray-500 text-lg">Belum ada data prestasi tersimpan.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Data Tes -->
    <div class="bg-white rounded-lg shadow-lg border border-gray-200">
        <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-4 rounded-t-lg">
            <h3 class="text-xl font-semibold">📝 Data Tes</h3>
        </div>
        <div class="p-6">
            <?php if (!empty($tes)): ?>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="border border-gray-300 p-3 text-center font-semibold text-gray-700">Nilai IQ</th>
                                <th class="border border-gray-300 p-3 text-center font-semibold text-gray-700">Nilai Wawancara</th>
                                <th class="border border-gray-300 p-3 text-center font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tes as $row): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="border border-gray-300 p-3 text-center">
                                        <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded font-semibold"><?= htmlspecialchars($row['iq'] ?? '') ?></span>
                                    </td>
                                    <td class="border border-gray-300 p-3 text-center">
                                        <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded font-semibold"><?= htmlspecialchars($row['wawancara'] ?? '') ?></span>
                                    </td>
                                    <td class="border border-gray-300 p-3 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="<?= base_url('mahasiswa/detail/' . $id_mahasiswa . '/tes/' . $row['id_tes']) ?>"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition duration-200">
                                                Edit
                                            </a>
                                            <a href="<?= base_url('mahasiswa/deleteTes/' . ($row['id_tes'] ?? '') . '/' . $id_mahasiswa) ?>"
                                                onclick="return confirm('Yakin hapus data ini?')"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition duration-200">
                                                Hapus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-8">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <p class="text-gray-500 text-lg">Belum ada data tes tersimpan.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Action Button -->
<div class="max-w-6xl mx-auto mt-8 mb-8">
    <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-6">
        <div class="text-center">
            <h4 class="text-lg font-semibold text-gray-800 mb-4">Proses Perhitungan</h4>
            <form method="post" action="<?= base_url('mahasiswa/prosesChip/' . $mahasiswa['id_mahasiswa']) ?>">
                <button type="submit" class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-4 px-8 rounded-lg transition duration-200 transform hover:scale-105 shadow-lg">
                    <svg class="w-6 h-6 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    Hitung Nilai Chip
                </button>
            </form>
        </div>
    </div>
</div>