<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/', 'Home::index'); //routes default

// $routes->get('/pegawai', 'Pegawai::index'); //methode halaman awal
$routes->get('/', 'Pegawai::index'); //methode halaman awal
$routes->get('/pegawai/create', 'Pegawai::create'); //methode membuat data
$routes->post('/pegawai/store', 'Pegawai::store'); //methode menampilkan data pegawai dan required jika form kosong
$routes->get('pegawai/edit/(:num)', 'Pegawai::edit/$1'); //methode edit
$routes->post('pegawai/update/(:num)', 'Pegawai::update/$1'); //method update
$routes->get('pegawai/delete/(:num)', 'Pegawai::delete/$1'); //methode delete

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
