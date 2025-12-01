<div class="max-w-3xl bg-white mx-auto rounded-2xl shadow-lg overflow-hidden">
  <div class="bg-gray-600 text-white py-4 px-6">
    <h2 class="text-xl font-bold text-center">Edit Range IQ</h2>
  </div>

  <div class="p-6">
    <form method="post" action="<?= base_url('rangeiq/edit/'.$iq->id_range_iq) ?>" class="space-y-6">

      <div>
        <label class="block text-sm font-semibold mb-2">Nilai Minimum</label>
        <input type="number" name="nilai_min" value="<?= $iq->nilai_min ?>" required class="w-full border rounded-lg px-4 py-3">
      </div>

      <div>
        <label class="block text-sm font-semibold mb-2">Nilai Maksimum</label>
        <input type="number" name="nilai_max" value="<?= $iq->nilai_max ?>" required class="w-full border rounded-lg px-4 py-3">
      </div>

      <div>
        <label class="block text-sm font-semibold mb-2">Keterangan</label>
        <input type="text" name="keterangan" value="<?= $iq->keterangan ?>" required class="w-full border rounded-lg px-4 py-3">
      </div>

      <div class="flex justify-end gap-3 pt-6 border-t">
        <button type="button"
          onclick="document.getElementById('modalEditIQ<?= $iq->id_range_iq ?>').classList.add('hidden')"
          class="px-6 py-3 rounded-lg border text-gray-700 hover:bg-gray-100">
          Batal
        </button>

        <button type="submit"
          class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-lg shadow-md">
          Update Data
        </button>
      </div>
    </form>
  </div>
</div>
