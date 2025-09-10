<div class="min-h-screen w-full flex items-center justify-center bg-gray-100">
  <div class="w-full max-w-sm bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Login</h2>

    <?php if($this->session->flashdata('error')): ?>
      <div class="bg-red-100 text-red-600 text-sm p-3 rounded mb-4">
        <?= $this->session->flashdata('error'); ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('login/auth'); ?>" class="space-y-4">
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
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
        Login
      </button>
    </form>

    <p class="mt-4 text-sm text-gray-600 text-center">
      Belum punya akun? 
      <a href="<?= base_url('login/register') ?>" class="text-blue-600 hover:underline">Register</a>
    </p>
  </div>
</div>
