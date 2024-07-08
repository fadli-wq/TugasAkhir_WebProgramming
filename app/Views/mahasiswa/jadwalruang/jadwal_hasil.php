<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <title>Hasil Jadwal Ruang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lexend';
            font-weight: 200;
        }
        
        h1,
        .alert,
        table {
            text-align: center;
            margin: 0 auto;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
        <header class="header-title mb-4">
            <h1>Hasil Jadwal Ruang</h1>
            <hr>
        </header>
        <section>
            <?php
            // Buat objek IntlDateFormatter untuk bahasa Indonesia
            $fmt = new \IntlDateFormatter('id_ID', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE);
            $dariTanggal = $fmt->format(new \DateTime($dari_tanggal));
            $sampaiTanggal = $fmt->format(new \DateTime($sampai_tanggal));
            ?>

            <?php if (count($jadwal) > 0) : ?>
                <div class="alert alert-warning">Ruangan <?= $ruangan ?> sudah dipinjam pada periode yang dipilih:</div>
                <table class="table table-striped w-75">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Ruangan</th>
                            <th>Periode Peminjaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($jadwal as $row) :
                            // Konversi tanggal menggunakan IntlDateFormatter
                            $tanggalMulai = $fmt->format(new \DateTime($row['tanggal_mulai']));
                            $tanggalBerakhir = $fmt->format(new \DateTime($row['tanggal_berakhir']));
                        ?>
                            <tr>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['ruangan'] ?></td>
                                <td><?= $tanggalMulai ?> - <?= $tanggalBerakhir ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert alert-success">Ruangan <?= $ruangan ?> tersedia pada periode <?= $dariTanggal ?> - <?= $sampaiTanggal ?>.</div>
            <?php endif; ?>
            <div class="d-flex justify-content-between mt-3">
                <a href="<?= base_url('mahasiswa/jadwal_ruang') ?>" class="btn btn-primary">Kembali ke Jadwal</a>
                <a href="<?= base_url('mahasiswa/pinjam_ruang') ?>" class="btn btn-success">Lanjut ke Peminjaman Ruangan</a>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>