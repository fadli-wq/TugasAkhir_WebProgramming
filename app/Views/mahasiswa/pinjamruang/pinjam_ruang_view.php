<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <title>Form Peminjaman Ruang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <h1 class="text-center">Form Peminjaman Ruangan</h1>
        <hr>
        <div class="alert alert-info alert-dismissible fade show" role="alert"><strong>
                Jika ingin meminjam ruangan dengan periode 1 hari pilih tanggal mulai dan tanggal berakhir yang sama.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>
                Bagi dosen harap mengisi kolom program studi dengan "-".</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <form action="<?= base_url('mahasiswa/pinjamruang/pinjamruang/submit') ?>" method="post" enctype="multipart/form-data">
            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('errors') ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="nim" class="form-label">NIM/NIDN</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= old('nim') ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" value="<?= old('prodi') ?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="telp" class="form-label">No. HP</label>
                    <input type="text" class="form-control" id="telp" name="telp" value="<?= old('telp') ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="ruangan" class="form-label">Pilih Ruangan</label>
                    <select name="ruangan" id="ruangan" class="form-select" required>
                        <option value=""> </option>
                        <option value="DS 201">DS 201</option>
                        <option value="DS 202">DS 202</option>
                        <option value="DS 203">DS 203</option>
                        <option value="DS 301">DS 301</option>
                        <option value="DS 302">DS 302</option>
                        <option value="DS 303">DS 303</option>
                        <option value="DS 401">DS 401</option>
                        <option value="DS 402">DS 402</option>
                        <option value="DS 403">DS 403</option>
                        <option value="KHD 201">KHD 201</option>
                        <option value="KHD 202">KHD 202</option>
                        <option value="KHD 203">KHD 203</option>
                        <option value="FIK LAB 301">FIK LAB 301</option>
                        <option value="FIK LAB 302">FIK LAB 302</option>
                        <option value="FIK LAB 303">FIK LAB 303</option>
                        <option value="FIK LAB 401">FIK LAB 401</option>
                        <option value="FIK LAB 402">FIK LAB 402</option>
                        <option value="FIK LAB 403">FIK LAB 403</option>
                        <option value="Selasar KHD">Selasar KHD</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="role" class="form-label">Pinjam Sebagai</label>
                    <select class="form-select" id="role" name="role" required>
                        <option value=""> </option>
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Dosen">Dosen</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?= old('tanggal_mulai') ?>" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" value="<?= old('tanggal_berakhir') ?>" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= old('keterangan') ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?= base_url('mahasiswa/lihat_status_pinjam2') ?>" class="btn btn-info">Cek Status Peminjaman</a>
            <a href="<?= base_url('mahasiswa/dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>