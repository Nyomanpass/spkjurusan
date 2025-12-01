<div class="max-w-3xl bg-white mx-auto rounded-2xl shadow-lg overflow-hidden">

    <!-- Header -->
    <div class="bg-gradient-to-r from-gray-600 to-gray-600 text-white py-4 px-6">
        <h2 class="text-xl font-bold text-center">Tambah Range Nilai Mapel</h2>
    </div>

    <!-- Form -->
    <div class="p-6">
        <form method="post" action="<?= base_url('RangeMapel/add') ?>" class="space-y-6">

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Minimum</label>
                <input type="number" name="nilai_min" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-gray-500 focus:border-transparent transition duration-200 hover:border-gray-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Maksimum</label>
                <input type="number" name="nilai_max" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-gray-500 focus:border-transparent transition duration-200 hover:border-gray-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                <input type="text" name="keterangan" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-gray-500 focus:border-transparent transition duration-200 hover:border-gray-400">
            </div>

            <!-- Tombol -->
            <div class="flex justify-end gap-3 pt-6 border-t">
                <button type="button"
                    onclick="document.getElementById('modalTambahRange').classList.add('hidden')"
                    class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition duration-200">
                    Batal
                </button>

                <button type="submit"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transform transition duration-200 hover:scale-105">
                    Simpan Data
                </button>
            </div>

        </form>
    </div>
</div>
