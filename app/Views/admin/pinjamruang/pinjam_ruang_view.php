<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Daftar Peminjaman Ruangan</title>
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
            $('#peminjamanTable').DataTable({
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

        .notification {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .notification.error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        body {
            font-family: 'Lexend', sans-serif;
            font-weight: 200;
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
                        <a class="nav-link active" href="<?= base_url('admin/pinjam_ruang') ?>">
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
                                <a class="nav-link" href="<?= base_url('admin/barang_hilang/cek') ?>">Kelola Barang
                                    Hilang</a>
                                <a class="nav-link" href="<?= base_url('admin/barang_hilang') ?>">Daftar Barang
                                    Hilang</a>
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
                    <h1 class="mt-4">Peminjaman Ruangan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Peminjaman Ruangan</li>
                    </ol>
                    <div class="card-body border rounded bg-white py-4 px-3 mb-5">
                        <header class='header-title mb-4'>
                            <h1>Daftar Peminjaman</h1>
                            <hr>
                        </header>
                        <!-- Menampilkan notifikasi di bagian atas -->
                        <?php if (session()->getFlashdata('notification')) : ?>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <?= session()->getFlashdata('notification') ?>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <?= session()->getFlashdata('error') ?>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        <?php endif; ?>
                        <section>
                            <div class="table-responsive">
                                <table class='table table-striped table-bordered' id="peminjamanTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIM/NIDN</th>
                                            <th>Program Studi</th>
                                            <th>Ruangan</th>
                                            <th>No. HP</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Keterangan</th>
                                            <th>Role</th>
                                            <th>Timestamp</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($peminjaman as $row) : ?>
                                            <tr>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['nim']; ?></td>
                                                <td><?= $row['prodi']; ?></td>
                                                <td><?= $row['ruangan']; ?></td>
                                                <td><?= $row['telp']; ?></td>
                                                <td><?= $row['tanggal_mulai']; ?></td>
                                                <td><?= $row['tanggal_berakhir']; ?></td>
                                                <td><?= $row['keterangan']; ?></td>
                                                <td><?= $row['role']; ?></td>
                                                <td><?= $row['timestamp']; ?></td>
                                                <td><?= $row['status']; ?></td>
                                                <td>
                                                    <form method="post" action="<?= base_url('admin/pinjam_ruang/update') ?>" style="display:inline;">
                                                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                                        <input type="hidden" name="nama" value="<?= $row['nama']; ?>">
                                                        <input type="hidden" name="nim" value="<?= $row['nim']; ?>">
                                                        <input type="hidden" name="ruangan" value="<?= $row['ruangan']; ?>">
                                                        <input type="hidden" name="timestamp" value="<?= $row['timestamp']; ?>">
                                                        <input type="hidden" name="currentPage" value="<?= $currentPage; ?>">
                                                        <select name="status" class="form-select form-select-sm mb-2">
                                                            <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : ''; ?>>
                                                                Pending</option>
                                                            <option value="Approved" <?= $row['status'] == 'Approved' ? 'selected' : ''; ?>>
                                                                Approved</option>
                                                            <option value="Rejected" <?= $row['status'] == 'Rejected' ? 'selected' : ''; ?>>
                                                                Rejected</option>
                                                        </select>
                                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <?= $pager->links('peminjaman', 'pager') ?>
                                </div>
                            </div>
                        </section>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="<?php echo base_url('dashboard') ?>/js/scripts.js"></script>
</body>

</html>