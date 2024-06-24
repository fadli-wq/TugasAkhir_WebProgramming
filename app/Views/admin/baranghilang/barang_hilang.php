<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Barang Hilang</title>
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
    </style>
</head>

<body>
    <!-- CONTAINER -->
    <div class="container">
        <!-- Alert Container -->
        <div id="alertContainer"></div>

        <!-- CARD -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Admin - Barang Hilang
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Tempat Ditemukan</th>
                                <th>Contact Person</th>
                                <th>Foto Barang</th>
                                <th>Status Pengembalian</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($barang_hilang as $barang) : ?>
                                <tr>
                                    <td><?= $barang['id'] ?></td>
                                    <td><?= $barang['nama_barang'] ?></td>
                                    <td><?= $barang['tempat_ditemukan'] ?></td>
                                    <td><?= $barang['contact_person'] ?></td>
                                    <td>
                                        <?php if (!empty($barang['nama_file'])) : ?>
                                            <img src="<?= base_url('uploads/' . urlencode($barang['nama_file'])) ?>" alt="Foto Barang" width="100" height="auto">
                                        <?php else : ?>
                                            <span>Tidak ada foto</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $barang['status_pengembalian'] ?></td>
                                    <td><button type="button" class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $barang['id'] ?>" data-status="<?= $barang['status_pengembalian'] ?>">Edit</button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editModalLabel">Edit Status Pengembalian</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Input Data -->
                                <form id="formEditStatus" enctype="multipart/form-data">
                                    <input type="hidden" id="editId" name="id">
                                    <div class="mb-3">
                                        <label for="editStatus" class="form-label">Status Pengembalian</label>
                                        <select id="editStatus" name="status" class="form-select">
                                            <option value="belum">Belum</option>
                                            <option value="sudah">Sudah</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary" id="tombolUpdate">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        // Edit button click event
        $('.edit-btn').on('click', function() {
            var id = $(this).data('id');
            var status = $(this).data('status');

            $('#editId').val(id);
            $('#editStatus').val(status);
        });

        // Update button click event
        $('#tombolUpdate').on('click', function() {
            var formData = new FormData($('#formEditStatus')[0]);

            $.ajax({
                url: "<?php echo site_url('admin/baranghilang/baranghilang/updateStatus'); ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.sukses == false) {
                        $('.edit-sukses').hide();
                        $('.edit-error').show();
                        $('.edit-error').html($obj.error);
                    } else {
                        $('.edit-error').hide();
                        $('.edit-sukses').show();
                        $('.edit-sukses').html($obj.message);

                        // Update the status in the table row
                        var id = $('#editId').val();
                        $('button[data-id="' + id + '"]').closest('tr').find('td:eq(5)').text($('#editStatus').val());

                        $('#editModal').modal('hide');
                        $('#alertContainer').html('<div class="alert alert-success alert-dismissible fade show" role="alert">' + $obj.message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    }
                },
                error: function(xhr, status, error) {
                    $('.edit-sukses').hide();
                    $('.edit-error').show();
                    $('.edit-error').html('Terjadi kesalahan pada server.');
                }
            });
        });
    </script>

</body>

</html>
