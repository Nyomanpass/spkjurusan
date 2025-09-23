<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Setting Kriteria & Prestasi</h1>

 <!--  Kriteria & Mapel  -->
<div class="mb-8">
   <?php $this->load->view('kriteria_mapel/index'); ?>
</div>


    <!--  Prestasi  -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Nilai Prestasi Akademik</h2>
        <form method="post" action="<?= site_url('setting/update_prestasi') ?>" class="bg-white shadow-md rounded-lg p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 mb-4">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 uppercase">Tingkat</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 uppercase">Juara 1</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 uppercase">Juara 2</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 uppercase">Juara 3</th>
                            <th class="px-4 py-2 text-left text-sm font-medium text-gray-600 uppercase">Juara >=4</th>
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
                            <td class="px-4 py-2"><?= $tingkat ?></td>
                            <td class="px-4 py-2">
                                <input type="number" name="nilai[<?= $tingkat ?>][1]" value="<?= $juaraList[1] ?? 0 ?>" class="w-20 border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="nilai[<?= $tingkat ?>][2]" value="<?= $juaraList[2] ?? 0 ?>" class="w-20 border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="nilai[<?= $tingkat ?>][3]" value="<?= $juaraList[3] ?? 0 ?>" class="w-20 border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            </td>
                            <td class="px-4 py-2">
                                <input type="number" name="nilai[<?= $tingkat ?>][>=4]" value="<?= $juaraList['>=4'] ?? 0 ?>" class="w-20 border rounded px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-300">
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded shadow">Simpan Prestasi</button>
        </form>
    </div>
    
    <!-- mata pelajaran -->
    <div class="mb-8">
        <?php $this->load->view('matapelajaran/index'); ?>
    </div>

</div>
