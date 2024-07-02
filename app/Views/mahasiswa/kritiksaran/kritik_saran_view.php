<!DOCTYPE html>
<html lang="id">

<head> <!-- Ini view-nya-->
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <title>Kritik dan Saran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lexend';
            font-weight: 200;
        }
        .header-title h1 {
            text-align: center;
            font-weight: bold;
        }

        .star-rating {
            direction: rtl;
            display: inline-block;
            padding: 5px;
        }

        .star-rating input[type=radio] {
            display: none;
        }

        .star-rating label {
            color: #bbb;
            font-size: 18px;
            padding: 0;
            cursor: pointer;
        }

        .star-rating input[type=radio]:checked~label {
            color: #f2b600;
        }

        .star-rating label:hover,
        .star-rating label:hover~label {
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
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
        <header class="header-title mb-4">
            <h1><span class="fw-bold text-dark">Kritik dan Saran</span></a></h1>
            <hr>
        </header>
        <section>
            <form action="<?= base_url('/mahasiswa/kritik_saran/submit') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <textarea class="form-control" id="kritikSaran" name="kritikSaran" rows="4" placeholder="Apa pendapatmu mengenai fasilitas kami?"><?= htmlspecialchars($kritikSaran ?? '') ?></textarea>
                    <div class="mt-2">
                        <button type="button" class="btn btn-secondary btn-rekomendasi btn-sm" name="rekomendasi" value="Kebersihannya sangat baik" onclick="addRekomendasi(this)">Kebersihannya sangat baik</button>
                        <button type="button" class="btn btn-secondary btn-rekomendasi btn-sm" name="rekomendasi" value="Ruangannya rapi" onclick="addRekomendasi(this)">Ruangannya rapi</button>
                        <button type="button" class="btn btn-secondary btn-rekomendasi btn-sm" name="rekomendasi" value="Fasilitas sangat lengkap" onclick="addRekomendasi(this)">Fasilitas sangat lengkap</button>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <div class="star-rating">
                        <input id="star5" type="radio" name="rating" value="5">
                        <label for="star5" title="5 stars">&#9733;</label>
                        <input id="star4" type="radio" name="rating" value="4">
                        <label for="star4" title="4 stars">&#9733;</label>
                        <input id="star3" type="radio" name="rating" value="3">
                        <label for="star3" title="3 stars">&#9733;</label>
                        <input id="star2" type="radio" name="rating" value="2">
                        <label for="star2" title="2 stars">&#9733;</label>
                        <input id="star1" type="radio" name="rating" value="1">
                        <label for="star1" title="1 star">&#9733;</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="uploadFoto" class="custom-file-label">Unggah Foto (opsional)</label>
                    <input class="form-control" type="file" id="uploadFoto" name="uploadFoto">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function addRekomendasi(button) {
            var textarea = document.getElementById("kritikSaran");
            textarea.value += " " + button.value;
        }
    </script>
</body>
</html>