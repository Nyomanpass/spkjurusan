<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Grafik Rekomendasi Jurusan -->
    <div class="p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-3">
            📈 Grafik Rekomendasi Jurusan
        </h2>
        <canvas id="rekomendasiChart" height="260"></canvas>
    </div>

    <!-- Grafik Kecocokan Jurusan -->
    <div class="p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-3">
            📊 Grafik Kecocokan Jurusan
        </h2>
        <canvas id="cocokChart" height="100"></canvas>
    </div>
</div>


<?php
$jurusanCount = [];
if (!empty($hasil)) {
    foreach ($hasil as $row) {
        $jurusan = $row['jurusan'];
        if (!isset($jurusanCount[$jurusan])) {
            $jurusanCount[$jurusan] = 0;
        }
        $jurusanCount[$jurusan]++;
    }
}
?>

<div class="mb-4 mt-5">
    <input 
        type="text" 
        id="searchInput" 
        placeholder="Cari siswa..." 
        class="w-full sm:w-1/2 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
    >
</div>


<?php if (!empty($hasil)): ?>
  <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
    <div class="overflow-x-auto">
      <table id="siswaTable" class="min-w-full divide-y divide-gray-200">
        <!-- Header -->
        <thead class="bg-gradient-to-r from-blue-600 to-blue-700">
          <tr>
            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
              Nama
            </th>
            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
              NIM
            </th>
            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
              Rekomendasi Jurusan
            </th>
            <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">
              Nilai Preferensi
            </th>
          </tr>
        </thead>

        <!-- Body -->
        <tbody class="bg-white divide-y divide-gray-200">
          <?php foreach ($hasil as $index => $row): ?>
            <tr class="hover:bg-blue-50 transition-colors duration-150">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                <?= $row['nama']; ?>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                <?= $row['nim']; ?>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm">
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full font-medium">
                  <?= $row['jurusan']; ?>
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-center">
                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full font-medium text-sm">
                  <?= number_format($row['nilai'], 3); ?>
                </span>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
<?php else: ?>
  <p class="text-gray-500 italic">Belum ada data preferensi siswa.</p>
<?php endif; ?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

const cocokCtx = document.getElementById('cocokChart').getContext('2d');
new Chart(cocokCtx, {
    type: 'pie',
    data: {
        labels: ['Cocok', 'Tidak Cocok'],
        datasets: [{
            data: [<?= $cocok ?>, <?= $tidak_cocok ?>],
            backgroundColor: ['#22c55e', '#ef4444'], // hijau & merah
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const value = context.parsed;
                        const percentage = ((value / total) * 100).toFixed(1);
                        return `${context.label}: ${value} (${percentage}%)`;
                    }
                }
            }
        }
    }
});


    const ctx = document.getElementById('rekomendasiChart').getContext('2d');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode(array_keys($jurusanCount)) ?>,
    datasets: [{
      label: 'Jumlah Rekomendasi',
      data: <?= json_encode(array_values($jurusanCount)) ?>,
      backgroundColor: [
        'rgba(37, 99, 235, 0.8)',   // biru
        'rgba(16, 185, 129, 0.8)', // hijau
        'rgba(245, 158, 11, 0.8)', // kuning
        'rgba(239, 68, 68, 0.8)',  // merah
        'rgba(139, 92, 246, 0.8)'  // ungu
      ],
      borderRadius: 8
    }]
  },
  options: {
    indexAxis: 'x',
    responsive: true,
    plugins: {
      legend: { display: false },
      tooltip: {
        backgroundColor: '#1f2937',
        titleColor: '#fff',
        bodyColor: '#f9fafb',
        padding: 10,
        borderRadius: 6
      }
    },
    scales: {
      x: {
        grid: { display: false },
        ticks: { font: { weight: '600' }, color: '#374151' }
      },
      y: {
        beginAtZero: true, 
        ticks: { stepSize: 1, color: '#374151' },
        grid: { color: '#e5e7eb' },
        suggestedMin: 0,  
      }
    }
  }
});



    // 🔍 Fitur Pencarian
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const keyword = this.value.toLowerCase();
        const rows = document.querySelectorAll("#siswaTable tbody tr");

        rows.forEach(row => {
            const nama = row.cells[0].textContent.toLowerCase();
            const nim = row.cells[1].textContent.toLowerCase();
            const jurusan = row.cells[2].textContent.toLowerCase();

            if (nama.includes(keyword) || nim.includes(keyword) || jurusan.includes(keyword)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });
</script>
