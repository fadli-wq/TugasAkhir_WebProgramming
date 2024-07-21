<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Hilang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lexend';
            font-weight: 200;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
        <h3>Barang Hilang</h3>
        <button type="button" class="btn btn-primary">
            <a href="<?= site_url('mahasiswa/barang_hilang/form') ?>" style="text-decoration: none; color: white; font-weight: bold;">
                Laporkan Barang Hilang
            </a>
        </button>
        <div class="row mt-4">
            <?php if (isset($barang_hilang) && count($barang_hilang) > 0) : ?>
                <?php foreach ($barang_hilang as $index => $dataBH) : ?>
                    <?php if ($index % 3 == 0 && $index != 0) : ?>
        </div>
        <div class="row mt-4">
        <?php endif; ?>
        <div class="col-md-4 mt-4">
            <div class="card h-100">
                <img src="<?= base_url('uploads/' . urlencode($dataBH['nama_file'])) ?>" class="card-img-top" alt="<?= $dataBH['nama_barang'] ?>" style="object-fit: cover; height: 180px;">
                <div class="card-body">
                    <h5 class="card-title"><?= $dataBH['nama_barang'] ?></h5>
                    <p class="card-text"><b>Tempat Ditemukan:</b> <?= $dataBH['tempat_ditemukan'] ?></p>
                    <p class="card-text"><b>Contact Person:</b> <?= $dataBH['contact_person'] ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="col-12">
        <p class="text-center">Tidak ada barang hilang.</p>
    </div>
<?php endif; ?>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <?= $pager->links('barang_hilang', 'pager') ?>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" onclick="location.href='<?= base_url('mahasiswa/dashboard') ?>'">Kembali</button>
    </div>
    <!-- SCRIPT JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>