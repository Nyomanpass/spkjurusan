<div class="w-full max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
  <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Register</h2>

  <form method="post" action="<?= base_url('login/proses_register') ?>" class="space-y-4">
    <div>
      <label class="block text-gray-700 mb-1">Nama Lengkap</label>
      <input type="text" name="nama_lengkap" required 
             class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>

    <div>
      <label class="block text-gray-700 mb-1">Tempat Lahir</label>
      <input type="text" name="tempat_lahir" required 
             class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>

    <div>
      <label class="block text-gray-700 mb-1">Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" required 
             class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>

    <div>
      <label class="block text-gray-700 mb-1">Alamat</label>
      <textarea name="alamat" required rows="3"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
    </div>

    <div>
      <label class="block text-gray-700 mb-1">No Telepon</label>
      <input type="text" name="no_telepon" required 
             class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>

    <div>
      <label class="block text-gray-700 mb-1">Username</label>
      <input type="text" name="username" required 
             class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>

    <div>
      <label class="block text-gray-700 mb-1">Password</label>
      <input type="password" name="password" required 
             class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
    </div>

    <div>
      <label class="block text-gray-700 mb-1">Level</label>
      <select name="level" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
    </div>

    <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition">
      Register
    </button>
  </form>

  <p class="mt-4 text-sm text-gray-600 text-center">
    Sudah punya akun? 
    <a href="<?= base_url('login') ?>" class="text-blue-600 hover:underline">Login</a>
  </p>
</div>

