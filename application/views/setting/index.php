<div class="">
 <!--  Kriteria & Mapel  -->
<div class="mb-8">
   <?php $this->load->view('kriteria_mapel/index'); ?>
</div>


    <!--  Prestasi  -->
    <div class="mb-8 bg-white rounded-lg shadow overflow-hidden">
    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-600 to-gray-700 px-6 py-4">
        <h2 class="text-white font-semibold flex items-center">
            <i class="fas fa-trophy mr-2"></i> 
            Nilai Prestasi Akademik
        </h2>
    </div>

    <!-- Form -->
    <form method="post" action="<?= site_url('setting/update_prestasi') ?>" class="p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 mb-4">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 uppercase">Tingkat</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 uppercase">Juara 1</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 uppercase">Juara 2</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 uppercase">Juara 3</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 uppercase">Juara ≥ 4</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    $prestasiGrouped = [];
                    foreach($prestasi_nilai as $p){
                        $prestasiGrouped[$p['tingkat']][$p['juara']] = $p['nilai'];
                    }

                    foreach($prestasiGrouped as $tingkat => $juaraList): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 font-medium text-gray-700"><?= $tingkat ?></td>
                        <td class="px-4 py-2">
                            <input type="number" name="nilai[<?= $tingkat ?>][1]" value="<?= $juaraList[1] ?? 0 ?>" 
                                class="w-24 border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" name="nilai[<?= $tingkat ?>][2]" value="<?= $juaraList[2] ?? 0 ?>" 
                                class="w-24 border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" name="nilai[<?= $tingkat ?>][3]" value="<?= $juaraList[3] ?? 0 ?>" 
                                class="w-24 border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" name="nilai[<?= $tingkat ?>][>=4]" value="<?= $juaraList['>=4'] ?? 0 ?>" 
                                class="w-24 border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Tombol simpan -->
        <div class="flex justify-start">
            <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                Simpan Prestasi
            </button>
        </div>
    </form>
</div>


    <!-- mata pelajaran -->
    <div class="mb-8">
        <?php $this->load->view('matapelajaran/index'); ?>
    </div>

</div>
