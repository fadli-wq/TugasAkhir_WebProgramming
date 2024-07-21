<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Barang Hilang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lexend';
            font-weight: 200;
        }

        .container {
            max-width: 800px;
            margin-top: 20px;
        }

        #preview {
            max-width: 300px;
            max-height: 300px;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>

<body>
    <!-- CONTAINER -->
    <div class="container">
        <!-- CARD -->
        <div class="card">
            <div class="card-header bg-secondary text-white fw-bold">
                Form Barang Hilang
            </div>
            <div class="card-body">
                <?php if (session()->has('hasil')) : ?>
                    <?php if (session('hasil.error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session('hasil.error') ?>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-primary" role="alert">
                            <?= session('hasil.sukses') ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- Input Data -->
                <form action="<?= site_url('mahasiswa/barang_hilang/simpan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="inputNama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="inputNama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputTempat" class="form-label">Tempat Ditemukan</label>
                        <input type="text" class="form-control" id="inputTempat" name="tempat" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputContact" class="form-label">Contact Person</label>
                        <input type="text" class="form-control" id="inputContact" name="contact" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputFile" class="form-label">Foto Barang</label>
                        <input type="file" class="form-control" id="inputFile" name="fupload" onchange="previewImage(this);" required>
                        <!-- Preview image -->
                        <img id="preview" src="#" alt="Preview Foto">
                    </div>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                            Jika sudah menemukan barangnya harap hubungi <strong>089509231437.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="location.href='<?= base_url('mahasiswa/dashboard') ?>'">Kembali</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SCRIPT JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                    $('#preview').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#preview').css('display', 'none'); // Sembunyikan preview jika tidak ada file dipilih
            }
        }
    </script>
</body>

</html>