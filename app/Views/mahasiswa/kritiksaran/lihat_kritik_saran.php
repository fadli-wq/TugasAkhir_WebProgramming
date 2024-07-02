<!DOCTYPE html>
<html lang="id">

<head> <!--ini view-->
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <title>Lihat Kritik dan Saran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <style>
        .header-title h1 {
            text-align: center;
            font-weight: bold;
        }

        body {
            font-family: 'Lexend';
            font-weight: 200;
        }
        
        .star-rating {
            direction: rtl;
            display: inline-block;
            padding: 5px;
        }

        .star-rating label {
            color: #bbb;
            font-size: 18px;
            padding: 0;
        }

        .star-rating .active {
            color: #f2b600;
        }

        .btn-rekomendasi {
            background-color: white;
            color: #6c757d;
            border: 1px solid #ccc;
        }

        .btn-rekomendasi:hover {
            background-color: #ccc;
            color: #6c757d;
        }

        .img-fluid {
            max-width: 100%;
            height: 500px;
            object-fit: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
        <header class="header-title mb-4">
            <h1><a href="<?= base_url('kritik_saran') ?>" style="text-decoration: none;"><span class="fw-bold text-dark">Lihat Kritik dan Saran</span></a></h1>
            <hr>
        </header>
        <section>
            <div class="mb-3">
                <label class="form-label">Kritik dan Saran</label>
                <textarea class="form-control" rows="4" readonly><?= htmlspecialchars($kritik_saran) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Rating</label>
                <div class="star-rating">
                    <?php for ($i = 5; $i >= 1; $i--) : ?>
                        <label class="<?= $i <= $rating ? 'active' : ''; ?>">&#9733;</label>
                    <?php endfor; ?>
                </div>
            </div>
            <?php if ($upload_foto) : ?>
                <div class="mb-3">
                    <div>
                        <?php if ($upload_foto) : ?>
                            <img src="<?= base_url('uploads/' . htmlspecialchars($upload_foto)) ?>" class="img-fluid" alt="Unggah Foto">
                        <?php else : ?>
                            <p>Tidak ada foto yang diunggah.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="button-container">
                <a href="<?= base_url('mahasiswa/dashboard') ?>" class="btn btn-primary">Kembali ke Dashboard</a>
                <a href="<?= base_url('mahasiswa/kritik_saran') ?>" class="btn btn-secondary">Kembali ke Kritik dan Saran</a>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>