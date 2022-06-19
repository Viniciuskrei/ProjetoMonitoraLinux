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

// ADD
$routes->add('/'				, 'IndexController::index');
$routes->add('/autenticacao'	, 'LoginController::index');
$routes->add('/logout'			, 'LoginController::logout');
$routes->add('/cadastrar'		, 'UsuarioController::formCadastra');
$routes->add('/listaUsuario'	, 'UsuarioController::listaUsuario');
$routes->add('/sobre'			, 'IndexController::sobre');

// GET
$routes->get('/usuario/editar/(:num)'	, 'UsuarioController::editaUsuario/$1');
$routes->get('/usuario/excluir/(:num)'	, 'UsuarioController::excluiUsuario/$1');

// POST
$routes->post('/autenticacao/login'	, 'LoginController::login');
$routes->post('/usuario/cadastrar'	, 'UsuarioController::cadastrar');
$routes->post('/usuario/editar'		, 'UsuarioController::editar');
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
