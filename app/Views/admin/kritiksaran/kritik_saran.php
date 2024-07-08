<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Kritik dan Saran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="<?php echo base_url('dashboard') ?>/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <style>
        .nav-link.active {
            background-color: #343a40;
            color: white;
        }

        body {
            font-family: 'Lexend';
            font-weight: 200;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
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
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
                            Barang Hilang
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?= base_url('admin/barang_hilang/cek') ?>">Kelola Barang Hilang</a>
                                <a class="nav-link" href="<?= base_url('admin/barang_hilang') ?>">Daftar Barang Hilang</a>
                            </nav>
                        </div>
                        <a class="nav-link active" href="<?= base_url('admin/kritik_saran') ?>">
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
                    <h1 class="mt-4">Kritik dan Saran</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Kritik dan Saran</li>
                    </ol>
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <strong>Daftar Kritik dan Saran</strong>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Kritik dan Saran</th>
                                            <th>Rating</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($kritik_saran)) : ?>
                                            <?php $no = ($currentPage - 1) * $perPage + 1;
                                            foreach ($kritik_saran as $row) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= htmlspecialchars($row['kritik_saran']) ?></td>
                                                    <td><?= htmlspecialchars($row['rating']) ?></td>
                                                    <td>
                                                        <?php if (!empty($row['upload_foto'])) : ?>
                                                            <img src="<?= base_url('uploads/' . urlencode($row['upload_foto'])) ?>" alt="Foto Kritik Saran" width="100">
                                                        <?php else : ?>
                                                            Tidak ada foto
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data yang tersedia</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12">
                                <?= $pager->links('kritik_saran', 'pager') ?>
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
</body>

</html>