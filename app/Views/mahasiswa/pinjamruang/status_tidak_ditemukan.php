<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <title>Status Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="alert alert-warning" role="alert">
            Tidak ada peminjaman ditemukan untuk <strong><?= $nama ?></strong> dengan NIM <strong><?= $nim ?></strong>.
        </div>
        <a href="<?= base_url('mahasiswa/pinjamruang/pinjamruang') ?>" class="btn btn-primary">Kembali</a>
        <button class="btn btn-info btn-refresh" onclick="refreshPage()">Refresh Halaman</button>
    </div>
    <script>
        function refreshPage() {
            window.location.reload();
        }
    </script>
</body>

</html>
