<!DOCTYPE html>
<html lang="id">

<head><!-- Ini view juga-->
    <meta charset="UTF-8">
    <title>Terima Kasih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .makasih {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
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
    <div class='makasih'>
        <div class='pesan'>
            <div class='icon'>&#10003;</div> <!-- Icon centang -->
            <h1>Terima Kasih!</h1>
            <p>Atas kritik dan saran yang Anda berikan</p>
            <a href="<?= base_url('mahasiswa/dashboard') ?>" class='btn btn-primary btn-home'>Kembali ke Beranda</a>
            <a href="<?= base_url('mahasiswa/lihat_kritik_saran/' . $id) ?>" class='btn btn-secondary btn-home'>Lihat Kritik dan Saran Anda</a>
        </div>
    </div>
</body>

</html>