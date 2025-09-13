<div class="min-h-screen bg-gray-50 py-8">
  <div class="max-w-md mx-auto ">
    <a href="<?= base_url('kriteria') ?>" class="inline-block mb-4 text-black hover:text-blue-600 font-semibold">
      &larr; Kembali ke Daftar Kriteria
    </a>
  </div>
  <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Kriteria</h2>

    <form method="post" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Kode</label>
        <input type="text"
          name="kode"
          value="<?= $kriteria->kode ?>"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
        <input type="text"
          name="nama"
          value="<?= $kriteria->nama ?>"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Sifat</label>
        <select name="sifat"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
          <option value="benefit" <?= $kriteria->sifat == 'benefit' ? 'selected' : '' ?>>Benefit</option>
          <option value="cost" <?= $kriteria->sifat == 'cost' ? 'selected' : '' ?>>Cost</option>
        </select>
      </div>

      <div class="pt-4">
        <button type="submit"
          class="w-full bg-green-500 hover:bg-green-600 text-white font-medium px-4 py-2 rounded-md transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
          Update Kriteria
        </button>
      </div>
    </form>
  </div>
</div>