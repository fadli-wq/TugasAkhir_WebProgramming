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

// Rute admin barang hilang
$routes->get('/admin/barang_hilang', 'admin\baranghilang\BarangHilang::index');
$routes->post('/admin/barang_hilang/update', 'admin\baranghilang\BarangHilang::updateStatus');

////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
// Rute mahasiswa
$routes->get('/mahasiswa/dashboard', 'mahasiswa\dashboard\MahasiswaDashboard::index');

// Rute mahasiswa jadwal ruang
$routes->get('/mahasiswa/jadwal_ruang','mahasiswa\jadwalruang\JadwalRuang::index');
$routes->post('/mahasiswa/jadwal_ruang/hasil','mahasiswa\jadwalruang\JadwalRuang::hasil');

// Rute mahasiswa barang hilang
$routes->get('/mahasiswa/barang_hilang', 'mahasiswa\baranghilang\BarangHilang::index');