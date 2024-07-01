<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Daftar Barang Hilang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo base_url('dashboard') ?>/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#barangTable').DataTable({
                "paging": false,
                "info": false,
                "order": [
                    [0, "asc"]
                ]
            });
        });
    </script>
    <style>
        .nav-link.active {
            background-color: #343a40;
            color: white;
        }

        body {
            font-family: 'Lexend', sans-serif;
            font-weight: 200;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">RADIF APP</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading d-flex justify-content-center align-items-center"><img src="<?= base_url('img/logo upnvj.png') ?>" width="120" height="120"></div>
                        <div class="sb-sidenav-menu-heading"></div>
                        <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="<?= base_url('admin/pinjam_ruang') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-landmark"></i></div>
                            Peminjaman Ruangan
                        </a>
                        <a class="nav-link collapsed active" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
                            Barang Hilang
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('admin/barang_hilang/cek') ?>">Kelola Barang Hilang</a>
                                <a class="nav-link active" href="<?= base_url('admin/barang_hilang') ?>">Daftar Barang Hilang</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="<?= base_url('admin/kritik_saran') ?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-comment-dots"></i></div>
                            Kritik dan Saran
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Masuk sebagai:</div>
                    <?php echo session()->get('nim'); ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Daftar Barang Hilang</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Daftar Barang Hilang</li>
                    </ol>
                    <!-- Note -->
                    <div class="alert alert-info alert-dismissible fade show" role="alert"><strong>
                            Anda harus menyetujui status barang hilang terlebih dahulu sebelum melakukan perubahan.</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="card-body">
                        <!-- CONTAINER -->
                        <!-- Alert Container -->
                        <div id="alertContainer"></div>

                        <!-- CARD -->
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                <strong>Daftar Barang Hilang</strong>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="barangTable">
                                        <thead class="table-dark">
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
                                            <?php $no = ($currentPage - 1) * $perPage + 1;
                                            foreach ($barang_hilang as $barang) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
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
                                                            <option value="Belum">Belum</option>
                                                            <option value="Sudah">Sudah</option>
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
                        <div class="row mt-4">
                            <div class="col-12">
                                <?= $pager->links('barang_hilang', 'pager') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; RADIF APP 2024</div>
                        <div></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('dashboard') ?>/js/scripts.js"></script>
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

                        // Update the status di table row
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