<div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden w-full">
    <!-- Header -->
    <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white py-4 px-6">
      <h2 class="text-xl font-bold text-center">Tambah Kriteria</h2>
    </div>

    <!-- Body -->
    <div class="p-6">
      <form method="post" action="<?= base_url('kriteria/tambah') ?>" class="space-y-5">
        <!-- Kode -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Kode</label>
          <input type="text" name="kode" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition"
            placeholder="Masukkan kode kriteria">
        </div>

        <!-- Nama -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
          <input type="text" name="nama" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition"
            placeholder="Masukkan nama kriteria">
        </div>

        <!-- Sifat -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Sifat</label>
          <select name="sifat" required
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition">
            <option value="benefit">Benefit</option>
            <option value="cost">Cost</option>
          </select>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end gap-3 pt-4 border-t">
          <a onclick="document.getElementById('modalKriteria').classList.add('hidden')"
            class="px-5 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 transition">
            Batal
          </a>
          <button type="submit"
            class="px-6 py-2 rounded-lg bg-yellow-600 text-white font-semibold hover:bg-yellow-700 shadow transition">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
