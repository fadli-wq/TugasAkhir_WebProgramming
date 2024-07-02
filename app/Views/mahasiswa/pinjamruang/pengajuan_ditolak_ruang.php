<!-- File: app/Views/pengajuan_ditolak.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <title>Pengajuan Ditolak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lexend';
            font-weight: 200;
        }
        .ditolak {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .pesan {
            text-align: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .pesan h1 {
            font-size: 2.5em;
            color: #343a40;
        }

        .pesan p {
            font-size: 1.2em;
            color: #6c757d;
        }

        .icon {
            font-size: 3em;
            color: green;
        }

        .btn-home {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="ditolak">
        <div class="pesan">
            <div class="icon">&#10060;</div> <!-- Icon cross -->
            <h1>Pengajuan Ditolak!</h1>
            <!-- Untuk menampilkan tanggal mulai yang sudah diformat ke dalam bahasa Indonesia -->
            <?php
            $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN);
            $tanggalMulaiFormatted = $formatter->format(strtotime($tanggalMulai));
            ?>
            <p>Ruangan <?= $ruangan ?> sudah dipinjam pada <?= $tanggalMulaiFormatted ?>.
                <br>Silakan menunggu hingga periode peminjaman berakhir.
            </p>
            <a href="<?= base_url('mahasiswa/dashboard') ?>" class="btn btn-secondary btn-home">Kembali ke Dashboard</a>
            <a href="<?= base_url('mahasiswa/pinjam_ruang') ?>" class="btn btn-primary btn-home">Kembali ke Form Peminjaman</a>
        </div>
    </div>
</body>

</html>