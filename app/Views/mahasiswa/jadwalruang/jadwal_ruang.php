<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <title>Jadwal Ruang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lexend';
            font-weight: 200;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
        <header class="header-title mb-4">
            <h1>Jadwal Ruang</h1>
            <hr>
        </header>
        <section>
            <form action="<?= base_url('mahasiswa/jadwal_ruang/hasil') ?>" method="post" class="form">
                <div class="mb-3">
                    <label for="ruangan" class="form-label">Pilih Ruangan</label>
                    <select name="ruangan" id="ruangan" class="form-select">
                        <option value="">Pilih Ruangan</option>
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
                <div class="mb-3 border p-3 rounded">
                    <label for="periode_peminjaman" class="form-label">Periode Peminjaman</label>
                    <div class="mb-3">
                        <label for="dari_tanggal" class="form-label">Dari Tanggal</label>
                        <input type="date" name="dari_tanggal" id="dari_tanggal" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="sampai_tanggal" class="form-label">Sampai Tanggal</label>
                        <input type="date" name="sampai_tanggal" id="sampai_tanggal" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="submit" name="submit" value="Periksa Jadwal" class="btn btn-primary">
                    <a href="<?= base_url('mahasiswa/dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
                </div>
            </form>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>