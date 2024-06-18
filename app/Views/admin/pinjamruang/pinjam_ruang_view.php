<!DOCTYPE html>
<html lang='id'>
<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset='UTF-8'>
    <title>Admin - Daftar Peminjaman</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <style>
        .notification {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        .notification.error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body class='bg-light'>
    <div class='container mt-5 border rounded bg-white py-4 px-3 mb-5'>
        <header class='header-title mb-4'>
            <h1>Daftar Peminjaman</h1>
            <hr>
        </header>
        <!-- Menampilkan notifikasi di bagian atas -->
        <?php if (session()->getFlashdata('notification')) : ?>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <?= session()->getFlashdata('notification') ?>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <?= session()->getFlashdata('error') ?>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        <?php endif; ?>
        <section>
            <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>
            <div class="table-responsive">
                <table class='table table-striped table-bordered'>
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
                            <th>Aksi</th>
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
                                <td>
                                    <form method="post" action="<?= base_url('admin/pinjam_ruang/update') ?>" style="display:inline;">
                                        <input type="hidden" name="nama" value="<?= $row['nama']; ?>">
                                        <input type="hidden" name="nim" value="<?= $row['nim']; ?>">
                                        <input type="hidden" name="ruangan" value="<?= $row['ruangan']; ?>">
                                        <select name="status" class="form-select form-select-sm mb-2">
                                            <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                            <option value="Approved" <?= $row['status'] == 'Approved' ? 'selected' : ''; ?>>Approved</option>
                                            <option value="Rejected" <?= $row['status'] == 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
