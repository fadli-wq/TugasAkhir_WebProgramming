<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Hilang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            max-width: 800px;
            margin-top: 20px;
        }

        #preview {
            max-width: 300px;
            max-height: 300px;
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
                Barang Hilang
            </div>
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    ! Laporkan Barang Hilang
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Barang Hilang</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Alert Error -->
                                <div class="alert alert-danger error" role="alert" style="display: none;">
                                </div>
                                <!-- Alert Sukses -->
                                <div class="alert alert-primary sukses" role="alert" style="display: none;">
                                </div>
                                <!-- Input Data -->
                                <form id="formBarangHilang" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="inputNama" class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" id="inputNama" name="nama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputTempat" class="form-label">Tempat Ditemukan</label>
                                        <input type="text" class="form-control" id="inputTempat" name="tempat">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputContact" class="form-label">Contact Person</label>
                                        <input type="text" class="form-control" id="inputContact" name="contact">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputFile" class="form-label">Foto Barang</label>
                                        <input type="file" class="form-control" id="inputFile" name="fupload" onchange="previewImage(this)">
                                        <img id="preview" src="#" alt="Preview Foto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputStatus" class="form-label">Status Pengembalian</label>
                                        <select id="inputStatus" class="form-select" disabled>
                                            <option value="belum">Belum</option>
                                            <option value="sudah">Sudah</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tabel Barang Hilang -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Tempat Ditemukan</th>
                                <th>Contact Person</th>
                                <th>Foto Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barang_hilang as $barang) : ?>
                                <tr>
                                    <td><?= $barang['nama_barang'] ?></td>
                                    <td><?= $barang['tempat_ditemukan'] ?></td>
                                    <td><?= $barang['contact_person'] ?></td>
                                    <td>
                                        <?php if (!empty($barang['nama_file'])) : ?>
                                            <img src="<?= base_url('uploads/' . urlencode($barang['nama_file'])) ?>" alt="Foto Barang" width="200" height="auto">
                                        <?php else : ?>
                                            <span>Tidak ada foto</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                    $('#preview').css('display', 'block');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#exampleModal').on('hidden.bs.modal', function(e) {
            // Reset nilai input file dan preview gambar
            $('#inputFile').val('');
            $('#preview').attr('src', '#').css('display', 'none');
        });
    
        $('#tombolSimpan').on('click', function() {
            var $nama = $('#inputNama').val();
            var $tempat = $('#inputTempat').val();
            var $contact = $('#inputContact').val();
            var formData = new FormData($('#formBarangHilang')[0]);
            formData.append('nama', $nama);
            formData.append('tempat', $tempat);
            formData.append('contact', $contact);
            formData.append('fupload', $('#inputFile')[0].files[0]);

            $.ajax({
                url: "<?php echo site_url('mahasiswa/baranghilang/baranghilang/simpan'); ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.sukses == false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($obj.error);
                    } else {
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($obj.sukses);

                        // Mengosongkan nilai input setelah disimpan
                        $('#inputNama').val('');
                        $('#inputTempat').val('');
                        $('#inputContact').val('');
                        $('#inputFile').val('');
                        $('#preview').attr('src', '#').css('display', 'none');
                    }

                }
            });
        });
    </script>

</body>

</html>