<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);
$routes->get('/', 'Home::index');
$routes->get('auth', 'Auth::index');
$routes->get('auth/login', 'Auth::login');          // ✅ route ke halaman login
$routes->post('auth/cek_login_user', 'Auth::cek_login_user'); // ✅ proses login
$routes->get('admin', 'Admin::index');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('Sekolah', 'Sekolah::index');
