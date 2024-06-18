<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Status Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .btn-back {
            margin-right: 10px; /* Jarak dari tombol Refresh */
        }
        .btn-refresh {
            background-color: transparent;
            border: 1px solid #adb5bd;
            color: #343a40;
        }
        .btn-refresh:hover {
            border: 1px solid #adb5bd;
            background-color: #e9ecef;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
        <header class="header-title mb-4">
            <h1>Status Peminjaman</h1>
            <hr>
        </header>
        <section>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Program Studi</th>
                            <th>Ruangan</th>
                            <th>No. HP</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Berakhir</th>
                            <th>Keterangan</th>
                            <th>Role</th>
                            <th>Timestamp</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($peminjaman as $row) : ?>
                            <tr>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['nim']; ?></td>
                                <td><?= $row['prodi']; ?></td>
                                <td><?= $row['ruangan']; ?></td>
                                <td><?= $row['telp']; ?></td>
                                <td><?= $row['tanggal_mulai']; ?></td>
                                <td><?= $row['tanggal_berakhir']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td><?= $row['role']; ?></td>
                                <td><?= $row['timestamp']; ?></td>
                                <td><?= $row['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <a href="<?= base_url('mahasiswa/pinjam_ruang') ?>" class="btn btn-primary text-white btn-back">Kembali ke Beranda</a>
                <button class="btn btn-info btn-refresh" onclick="refreshPage()">Refresh Halaman</button>
            </div>
        </section>
    </div>
    <script>
        function refreshPage() {
            window.location.reload();
        }
    </script>
</body>
</html>
