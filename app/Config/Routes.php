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
