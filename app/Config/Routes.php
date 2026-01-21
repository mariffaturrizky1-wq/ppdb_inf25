<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');
$routes->get('auth', 'Auth::index');
$routes->get('auth/login', 'Auth::login');          // ✅ route ke halaman login
$routes->get('auth/daftar', 'Auth::daftar');
$routes->post('auth/simpan_daftar', 'Auth::simpan_daftar');
$routes->post('auth/cek_login_user', 'Auth::cek_login_user'); // ✅ proses login
$routes->get('admin', 'Admin::index');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('sekolah', 'Sekolah::index');
$routes->get('sekolah/create', 'Sekolah::create');
$routes->post('sekolah/insertData', 'Sekolah::insertData');
$routes->post('sekolah/update', 'Sekolah::update');
$routes->post('sekolah/delete', 'Sekolah::delete');
$routes->get('pengumuman', 'Pengumuman::index');
$routes->get('pengumuman/(:segment)', 'Pengumuman::detail/$1');
$routes->get('contact', 'Contact::index');
$routes->get('profile', 'Profile::index');
$routes->post('profile/update', 'Profile::update');
$routes->get('pendaftaran', 'Pendaftaran::index');
$routes->post('pendaftaran/simpan', 'Pendaftaran::simpan');
$routes->get('pendaftaran/desa/(:num)', 'Pendaftaran::desa/$1');
$routes->get('informasi-ppdb', 'InformasiPpdb::index');
$routes->get('feedback', 'FeedbackController::index');
$routes->post('feedback', 'FeedbackController::store');
$routes->get('validasi', 'Validasi::index');

// ================= ADMIN (filter admin) =================
$routes->get('admin', 'Admin::index', ['filter' => 'admin']);

$routes->get('admin/validasi', 'AdminValidasi::index', ['filter' => 'admin']);
$routes->get('admin/validasi/(:num)', 'AdminValidasi::detail/$1', ['filter' => 'admin']);
$routes->post('admin/validasi/(:num)/set-status', 'AdminValidasi::setStatus/$1', ['filter' => 'admin']);
$routes->post('admin/validasi/dokumen/(:num)/set-status', 'AdminValidasi::setDokumenStatus/$1', ['filter' => 'admin']);

$routes->get('admin/feedback', 'FeedbackController::adminIndex', ['filter' => 'admin']);
$routes->get('admin/feedback/(:num)', 'FeedbackController::adminShow/$1', ['filter' => 'admin']);
$routes->get('admin/feedback/(:num)/delete', 'FeedbackController::adminDelete/$1', ['filter' => 'admin']);