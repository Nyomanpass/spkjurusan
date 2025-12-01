<div class="max-w-3xl bg-white mx-auto rounded-2xl shadow-lg overflow-hidden">
  <!-- Header -->
  <div class="bg-gradient-to-r from-yellow-600 to-yellow-600 text-white py-4 px-6">
    <h2 class="text-xl font-bold text-center">Edit Range Nilai</h2>
  </div>

  <!-- Form -->
  <div class="p-6">
    <form method="post" action="<?= base_url('RangeMapel/edit/'.$range->id_range) ?>" class="space-y-6">

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Minimum</label>
        <input type="number" name="nilai_min" value="<?= $range->nilai_min ?>" required
          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500 hover:border-yellow-400 transition">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Nilai Maksimum</label>
        <input type="number" name="nilai_max" value="<?= $range->nilai_max ?>" required
          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500 hover:border-yellow-400 transition">
      </div>

      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
        <input type="text" name="keterangan" value="<?= $range->keterangan ?>" required
          class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-yellow-500 hover:border-yellow-400 transition">
      </div>

      <!-- Tombol Aksi -->
      <div class="flex justify-end gap-3 pt-6 border-t">
        <button type="button"
          onclick="document.getElementById('modalEditRange<?= $range->id_range ?>').classList.add('hidden')"
          class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
          Batal
        </button>

        <button type="submit"
          class="bg-yellow-600 hover:bg-yellow-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md transform hover:scale-105 transition">
          Simpan Perubahan
        </button>
      </div>

    </form>
  </div>
</div>
