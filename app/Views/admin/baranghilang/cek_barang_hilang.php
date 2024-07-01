<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Data Barang Hilang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo base_url('dashboard') ?>/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#cekbarangTable').DataTable({
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
                                <a class="nav-link active" href="<?= base_url('admin/barang_hilang/cek') ?>">Kelola Barang Hilang</a>
                                <a class="nav-link" href="<?= base_url('admin/barang_hilang') ?>">Daftar Barang Hilang</a>
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
                    <h1 class="mt-4">Kelola Barang Hilang</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Kelola Barang Hilang</li>
                    </ol>
                    <div class="card-body border rounded bg-white py-4 px-3 mb-5">
                        <header class='header-title mb-4'>
                            <h2>Data Barang Hilang - Menunggu Persetujuan</h2>
                        </header>
                        <hr>
                        <?php if (session()->has('hasil')) : ?>
                            <?php if (session('hasil.error')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= session('hasil.error') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php elseif (session('hasil.sukses')) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?= session('hasil.sukses') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="cekbarangTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Tempat Ditemukan</th>
                                        <th>Contact Person</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($barang_hilang)) : ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data tersedia</td>
                                        </tr>
                                    <?php else : ?>
                                        <?php $no = ($currentPage - 1) * $perPage + 1;
                                        foreach ($barang_hilang as $barang) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $barang['nama_barang'] ?></td>
                                                <td><?= $barang['tempat_ditemukan'] ?></td>
                                                <td><?= $barang['contact_person'] ?></td>
                                                <td>
                                                    <img src="<?= base_url('uploads/' . $barang['nama_file']) ?>" alt="Foto Barang" width="200">
                                                </td>
                                                <td><?= $barang['status_pengembalian'] ?></td>
                                                <td>
                                                    <button class="btn btn-success btn-sm btn-approve" data-id="<?= $barang['id'] ?>" data-status="disetujui" data-page="<?= $currentPage; ?>">Setuju</button>
                                                    <button class="btn btn-danger btn-sm btn-reject" data-id="<?= $barang['id'] ?>" data-status="ditolak" data-page="<?= $currentPage; ?>">Tolak</button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <?= $pager->links('barang_hilang', 'pager') ?>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.btn-approve').forEach(button => {
            button.addEventListener('click', function() {
                let id = this.getAttribute('data-id');
                let status = this.getAttribute('data-status');
                let currentPage = this.getAttribute('data-page');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak dapat mengembalikan aksi ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, setujui!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form = document.createElement('form');
                        form.action = '<?= base_url('admin/baranghilang/BarangHilang/approve') ?>';
                        form.method = 'post';

                        let inputId = document.createElement('input');
                        inputId.type = 'hidden';
                        inputId.name = 'id';
                        inputId.value = id;

                        let inputStatus = document.createElement('input');
                        inputStatus.type = 'hidden';
                        inputStatus.name = 'status';
                        inputStatus.value = status;

                        let inputPage = document.createElement('input');
                        inputPage.type = 'hidden';
                        inputPage.name = 'currentPage';
                        inputPage.value = currentPage;

                        form.appendChild(inputId);
                        form.appendChild(inputStatus);
                        form.appendChild(inputPage);

                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });

        document.querySelectorAll('.btn-reject').forEach(button => {
            button.addEventListener('click', function() {
                let id = this.getAttribute('data-id');
                let status = this.getAttribute('data-status');
                let currentPage = this.getAttribute('data-page');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak dapat mengembalikan aksi ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, tolak!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form = document.createElement('form');
                        form.action = '<?= base_url('admin/baranghilang/BarangHilang/reject') ?>';
                        form.method = 'post';

                        let inputId = document.createElement('input');
                        inputId.type = 'hidden';
                        inputId.name = 'id';
                        inputId.value = id;

                        let inputStatus = document.createElement('input');
                        inputStatus.type = 'hidden';
                        inputStatus.name = 'status';
                        inputStatus.value = status;

                        let inputPage = document.createElement('input');
                        inputPage.type = 'hidden';
                        inputPage.name = 'currentPage';
                        inputPage.value = currentPage;

                        form.appendChild(inputId);
                        form.appendChild(inputStatus);
                        form.appendChild(inputPage);

                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    </script>
</body>

</html>