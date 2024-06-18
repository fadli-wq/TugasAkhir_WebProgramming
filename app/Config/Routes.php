<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// Rute default (Home)
$routes->get('/', 'Login::index');

// Rute logout
$routes->get('logout', 'Logout::logout');

// Rute admin
$routes->get('/admin/dashboard', 'admin\dashboard\AdminDashboard::index');

// Rute admin kritik saran
$routes->get('/admin/kritik_saran', 'admin\kritiksaran\KritikSaran::index');

// Rute admin barang hilang
$routes->get('/admin/barang_hilang', 'admin\baranghilang\BarangHilang::index');
$routes->post('/admin/barang_hilang/update', 'admin\baranghilang\BarangHilang::updateStatus');

// Rute admin pinjam ruang
$routes->get('/admin/pinjam_ruang', 'admin\pinjamruang\PinjamRuang::index');
$routes->post('/admin/pinjam_ruang/update', 'admin\pinjamruang\PinjamRuang::update');
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// Rute mahasiswa
$routes->get('/mahasiswa/dashboard', 'mahasiswa\dashboard\MahasiswaDashboard::index');

// Rute mahasiswa kritik saran
$routes->get('/mahasiswa/kritik_saran', 'mahasiswa\kritiksaran\KritikSaran::index');
$routes->get('/mahasiswa/kritik_saran/(:num)', 'mahasiswa\kritiksaran\KritikSaran::index/$1');
$routes->post('/mahasiswa/kritik_saran/submit', 'mahasiswa\kritiksaran\KritikSaran::submit');
$routes->get('/mahasiswa/lihat_kritik_saran/(:num)', 'mahasiswa\kritiksaran\KritikSaran::cekKritik/$1');

// Rute mahasiswa jadwal ruang
$routes->get('/mahasiswa/jadwal_ruang','mahasiswa\jadwalruang\JadwalRuang::index');
$routes->post('/mahasiswa/jadwal_ruang/hasil','mahasiswa\jadwalruang\JadwalRuang::hasil');

// Rute mahasiswa pinjam ruang
$routes->get('/mahasiswa/pinjam_ruang', 'mahasiswa\pinjamruang\PinjamRuang::index');
$routes->post('/mahasiswa/pinjam_ruang/submit', 'mahasiswa\pinjamruang\PinjamRuang::submit');
$routes->get('/mahasiswa/pinjamruang/view_pengajuan/(:num)', 'mahasiswa\pinjamruang\PinjamRuang::viewPengajuan/$1');
$routes->get('/mahasiswa/lihat_status_pinjam', 'mahasiswa\pinjamruang\PinjamRuang::cekStatusPeminjaman');
$routes->get('/mahasiswa/lihat_status_pinjam2', 'mahasiswa\pinjamruang\PinjamRuang2::cekStatusPeminjaman2');

// Rute mahasiswa barang hilang
$routes->get('/mahasiswa/barang_hilang', 'mahasiswa\baranghilang\BarangHilang::index');