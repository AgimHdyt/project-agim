<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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
$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'User::index', ['filter' => 'authfilter']);
$routes->get('/profile', 'User::profile', ['filter' => 'authfilter']);
$routes->post('/edit-profile', 'User::editProfile', ['filter' => 'authfilter']);
$routes->post('/edit-password', 'User::editPassword', ['filter' => 'authfilter']);

$routes->get('/data-user', 'Admin::dataUser', ['filter' => 'adminfilter']);
$routes->post('/add-user', 'Admin::addUser', ['filter' => 'adminfilter']);
$routes->post('/get-user', 'Admin::getUser', ['filter' => 'adminfilter']);
$routes->post('/edit-user', 'Admin::editUser', ['filter' => 'adminfilter']);
$routes->delete('/del-user/(:num)', 'Admin::delUser/$1', ['filter' => 'adminfilter']);

$routes->get('/data-dokter', 'Admin::dataDokter', ['filter' => 'adminfilter']);
$routes->post('/add-dokter', 'Admin::addDokter', ['filter' => 'adminfilter']);
$routes->post('/get-dokter', 'Admin::getDokter', ['filter' => 'adminfilter']);
$routes->post('/edit-dokter', 'Admin::editDokter', ['filter' => 'adminfilter']);
$routes->delete('/del-dokter/(:num)', 'Admin::delDokter/$1', ['filter' => 'adminfilter']);

$routes->get('/data-obat', 'Admin::dataObat', ['filter' => 'adminfilter']);
$routes->post('/add-obat', 'Admin::addObat', ['filter' => 'adminfilter']);
$routes->post('/get-obat', 'Admin::getObat', ['filter' => 'adminfilter']);
$routes->post('/edit-obat', 'Admin::editObat', ['filter' => 'adminfilter']);
$routes->delete('/del-obat/(:num)', 'Admin::delObat/$1', ['filter' => 'adminfilter']);

$routes->get('/data-pasien', 'Operator::dataPasien', ['filter' => 'operatorfilter']);
$routes->post('/add-pasien', 'Operator::addPasien', ['filter' => 'operatorfilter']);
$routes->post('/get-pasien', 'Operator::getPasien', ['filter' => 'operatorfilter']);
$routes->post('/edit-pasien', 'Operator::editPasien', ['filter' => 'operatorfilter']);
$routes->delete('/del-pasien/(:num)', 'Operator::delPasien/$1', ['filter' => 'operatorfilter']);

$routes->get('/data-resep', 'Owner::dataResep', ['filter' => 'authfilter']);
$routes->post('/add-resep', 'Owner::addResep', ['filter' => 'authfilter']);
$routes->post('/get-resep', 'Owner::getResep', ['filter' => 'authfilter']);
$routes->post('/edit-resep', 'Owner::editResep', ['filter' => 'authfilter']);
$routes->delete('/del-resep/(:num)', 'Owner::delResep/$1', ['filter' => 'authfilter']);

$routes->get('/data-berobat', 'Owner::dataBerobat', ['filter' => 'authfilter']);
$routes->post('/add-berobat', 'Owner::addBerobat', ['filter' => 'authfilter']);
$routes->post('/get-berobat', 'Owner::getBerobat', ['filter' => 'authfilter']);
$routes->post('/edit-berobat', 'Owner::editBerobat', ['filter' => 'authfilter']);
$routes->delete('/del-berobat/(:num)', 'Owner::delBerobat/$1', ['filter' => 'authfilter']);

$routes->get('/obat', 'Obat::dataObat');

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
