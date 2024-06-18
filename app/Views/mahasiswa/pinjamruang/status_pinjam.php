<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Status Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h3>Status Peminjaman Ruangan</h3>
        <table class="table table-bordered mt-3">
            <tr>
                <th>Nama</th>
                <td><?= $loan['nama'] ?></td>
            </tr>
            <tr>
                <th>NIM</th>
                <td><?= $loan['nim'] ?></td>
            </tr>
            <tr>
                <th>Prodi</th>
                <td><?= $loan['prodi'] ?></td>
            </tr>
            <tr>
                <th>Telp</th>
                <td><?= $loan['telp'] ?></td>
            </tr>
            <tr>
                <th>Ruangan</th>
                <td><?= $loan['ruangan'] ?></td>
            </tr>
            <tr>
                <th>Role</th>
                <td><?= $loan['role'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Mulai</th>
                <td><?= $loan['tanggal_mulai'] ?></td>
            </tr>
            <tr>
                <th>Tanggal Berakhir</th>
                <td><?= $loan['tanggal_berakhir'] ?></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><?= $loan['keterangan'] ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?= $loan['status'] ?></td>
            </tr>
        </table>
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