<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekomendasi Jurusan</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Jurusan Rekomendasi</h2>
    <h2>Rekomendasi Jurusan untuk: <?php echo $mahasiswa['nama_siswa']; ?></h2>
    <?php if(!empty($rekomendasi)): ?>
        <p><strong><?php echo $rekomendasi['nama_jurusan']; ?></strong> (Nilai: <?php echo $rekomendasi['nilai_preferensi']; ?>)</p>
    <?php else: ?>
        <p>Tidak ada data preferensi.</p>
    <?php endif; ?>

    <h2>Ranking Semua Jurusan</h2>
    <?php if(!empty($ranking)): ?>
        <table>
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Jurusan</th>
                    <th>Nilai Preferensi</th>
                </tr>
            </thead>
            <tbody>
                <?php $rank = 1; foreach($ranking as $r): ?>
                    <tr>
                        <td><?php echo $rank++; ?></td>
                        <td><?php echo $r['nama_jurusan']; ?></td>
                        <td><?php echo $r['nilai_preferensi']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Tidak ada data ranking.</p>
    <?php endif; ?>
</body>
</html>
