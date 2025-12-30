<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 11px; color: #333; }
        h2 { text-align: center; text-transform: uppercase; margin-bottom: 20px; }
        
        table { width: 100%; border-collapse: collapse; }
        
        /* Memberi warna pada Header */
        th { 
            background-color: #2563eb; /* Biru Royal */
            color: #ffffff; 
            padding: 10px 8px;
            border: 1px solid #1e40af;
            text-align: center;
            text-transform: uppercase;
        }
        
        td { 
            border: 1px solid #cbd5e1; 
            padding: 8px; 
            vertical-align: middle;
        }

        .text-center { text-align: center; }

        /* Style untuk status hasil */
        .cocok { 
            color: #15803d; /* Hijau */
            font-weight: bold; 
        }
        .tidak-cocok { 
            color: #b91c1c; /* Merah */
            font-weight: bold; 
        }

        /* Zebra striping untuk baris agar lebih mudah dibaca */
        tr:nth-child(even) { background-color: #f8fafc; }
    </style>
</head>
<body>
    <h2>Laporan Hasil Rekomendasi Jurusan</h2>
    
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM/NISN</th>
                <th>Jurusan Diminati</th>
                <th>Rekomendasi</th>
                <th>Hasil</th>
                <th>Nilai Preferensi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hasil as $row): ?>
            <tr>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['jurusan_sekarang']; ?></td>
                <td><?= $row['jurusan']; ?></td>
                <td class="text-center">
                    <?php if ($row['jurusan_sekarang'] == $row['jurusan']): ?>
                        <span class="cocok">COCOK</span>
                    <?php else: ?>
                        <span class="tidak-cocok">TIDAK COCOK</span>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                    <strong><?= number_format($row['nilai'], 3); ?></strong>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>