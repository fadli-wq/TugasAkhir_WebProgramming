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

// Rute admin (memerlukan login)
$routes->group('admin', ['filter' => 'login'], function($routes) {
    $routes->get('dashboard', 'admin\dashboard\AdminDashboard::index');
    $routes->get('kritik_saran', 'admin\kritiksaran\KritikSaran::index');
    $routes->get('barang_hilang', 'admin\baranghilang\BarangHilang::index');
    $routes->post('barang_hilang/update', 'admin\baranghilang\BarangHilang::updateStatus');
    $routes->get('barang_hilang/cek', 'admin\baranghilang\BarangHilang::cekBarang');
    $routes->post('barang_hilang/approve', 'admin\baranghilang\BarangHilang::approve');
    $routes->post('barang_hilang/reject', 'admin\baranghilang\BarangHilang::reject');
    $routes->get('pinjam_ruang', 'admin\pinjamruang\PinjamRuang::index');
    $routes->post('pinjam_ruang/update', 'admin\pinjamruang\PinjamRuang::update');
});

// Rute mahasiswa (memerlukan login)
$routes->group('mahasiswa', ['filter' => 'login'], function($routes) {
    $routes->get('dashboard', 'mahasiswa\dashboard\MahasiswaDashboard::index');
    $routes->get('kritik_saran', 'mahasiswa\kritiksaran\KritikSaran::index');
    $routes->get('kritik_saran/(:num)', 'mahasiswa\kritiksaran\KritikSaran::index/$1');
    $routes->post('kritik_saran/submit', 'mahasiswa\kritiksaran\KritikSaran::submit');
    $routes->get('lihat_kritik_saran/(:num)', 'mahasiswa\kritiksaran\KritikSaran::cekKritik/$1');
    $routes->get('jadwal_ruang','mahasiswa\jadwalruang\JadwalRuang::index');
    $routes->post('jadwal_ruang/hasil','mahasiswa\jadwalruang\JadwalRuang::hasil');
    $routes->get('pinjam_ruang', 'mahasiswa\pinjamruang\PinjamRuang::index');
    $routes->post('pinjam_ruang/submit', 'mahasiswa\pinjamruang\PinjamRuang::submit');
    $routes->get('pinjamruang/view_pengajuan/(:num)', 'mahasiswa\pinjamruang\PinjamRuang::viewPengajuan/$1');
    $routes->get('lihat_status_pinjam', 'mahasiswa\pinjamruang\PinjamRuang::cekStatusPeminjaman');
    $routes->get('lihat_status_pinjam2', 'mahasiswa\pinjamruang\PinjamRuang2::cekStatusPeminjaman2');
    $routes->get('barang_hilang', 'mahasiswa\baranghilang\BarangHilang::index');
    $routes->get('barang_hilang/form', 'mahasiswa\baranghilang\BarangHilang::form');
    $routes->post('barang_hilang/simpan', 'mahasiswa\baranghilang\BarangHilang::simpan');
});