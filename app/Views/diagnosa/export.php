<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- You can include any CSS styles or frameworks here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h2 {
            color: #555;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1><?= $title ?></h1>

    <div class="section">
        <h2>Gejala</h2>
        <?php if (!empty($gejala)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Gejala</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($gejala as $key => $item): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $item['nama_gejala'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No gejala available</p>
        <?php endif; ?>
    </div>

    <div class="section">
        <h2>Penyebab</h2>
        <?php if (!empty($penyebab)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Penyebab</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penyebab as $key => $item): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $item['nama_penyebab'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No Penyebab available</p>
        <?php endif; ?>
    </div>
    
    

    <div class="section">
        <h2>Penyakit</h2>
        <?php if (!empty($penyakit)): ?>
            <p><strong>Nama Penyakit:</strong> <?= $penyakit['nama_penyakit'] ?></p>
            <p><strong>Deskripsi:</strong> <?= $penyakit['deskripsi'] ?></p>
        <?php else: ?>
            <p>No penyakit available</p>
        <?php endif; ?>
    </div>

    <div class="section">
        <h2>Pasien</h2>
        <?php if (!empty($pasien)): ?>
            <p><strong>Nama:</strong> <?= $pasien['nama'] ?></p>
            <p><strong>Tanggal Lahir:</strong> <?= $pasien['tanggal_lahir'] ?></p>
            <p><strong>Email:</strong> <?= $pasien['email'] ?></p>
            <p><strong>No. Telp:</strong> <?= $pasien['no_telp'] ?></p>
            <p><strong>Jenis Kelamin:</strong> <?= $pasien['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?></p>
        <?php else: ?>
            <p>No pasien available</p>
        <?php endif; ?>
    </div>

    <div class="section">
        <h2>Solusi</h2>
        <?php if (!empty($solusi)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Gejala</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($solusi as $key => $item): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $item['nama_solusi'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No gejala available</p>
        <?php endif; ?>
    </div>

    <div class="section">
        <h2>Konsultasi</h2>
        <?php if (!empty($konsultasi)): ?>
            <p><strong>Tanggal Konsultasi:</strong> <?= $konsultasi['tanggal_konsultasi']['date'] ?></p>
        <?php else: ?>
            <p>No konsultasi available</p>
        <?php endif; ?>
    </div>

</body>
</html>
