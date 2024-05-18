<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Router\Route;
use App\Http\Controllers\UserController;

/**
 * @var RouteCollection $routes
 */

//RUTAS DE ADMINISTRADOR

$routes->setDefaultController('Home');
$routes->post('/login', 'Home::login');

$routes->get('/', 'Home::inicio');
$routes->get('/', 'Home::salir');

$routes->get('admin/inicio', 'Home::ingresar');
$routes->get('/salir', 'Home::salir');

$routes->get('admin/users', 'UserController::index');
$routes->post('admin/users/store', 'UserController::store');
$routes->get('admin/users/delete/(:num)', 'UserController::delete/$1');
$routes->post('admin/users/update', 'UserController::update');
$routes->get('admin/users/search', 'UserController::search');

$routes->get('admin/proveedores', 'ProveedoresController::index');
$routes->post('admin/proveedores/store', 'ProveedoresController::store');
$routes->post('admin/proveedores/update', 'ProveedoresController::update');
$routes->get('admin/proveedores/delete/(:num)', 'ProveedoresController::delete/$1');
$routes->get('admin/proveedores/search', 'ProveedoresController::search');

$routes->get('admin/equipos', 'EquipoController::index');
$routes->post('admin/equipos/store', 'EquipoController::store');
$routes->post('admin/equipos/update', 'EquipoController::update');
$routes->get('admin/equipos/delete/(:num)', 'EquipoController::delete/$1');
$routes->get('admin/equipos/search', 'EquipoController::search');

$routes->get('admin/mantenimiento', 'MantenimientoController::index');
$routes->post('admin/mantenimiento/store', 'MantenimientoController::store');
$routes->post('admin/mantenimiento/update', 'MantenimientoController::update');
$routes->get('admin/mantenimiento/delete/(:num)', 'MantenimientoController::delete/$1');
$routes->get('admin/mantenimiento/search', 'MantenimientoController::search');

$routes->get('admin/mobiliario', 'MobiliarioController::index');
$routes->post('admin/mobiliario/store', 'MobiliarioController::store');
$routes->post('admin/mobiliario/update', 'MobiliarioController::update');
$routes->get('admin/mobiliario/delete/(:num)', 'MobiliarioController::delete/$1');
$routes->get('admin/mobiliario/search', 'MobiliarioController::search');


//RUTAS DE USUARIOS DE LECTURA
$routes->get('/', 'HomeLectura::inicio');
$routes->get('/', 'HomeLectura::salir');

$routes->get('lectura/inicioL', 'HomeLectura::ingresar');
$routes->post('/login', 'HomeLectura::login');
$routes->get('/salir', 'HomeLectura::salir');


$routes->get('lectura/equiposL', 'EquipoController::indexL');
$routes->get('lectura/equiposL/searchL', 'EquipoController::searchL');
$routes->get('lectura/mobiliarioL', 'MobiliarioController::indexL');
$routes->get('lectura/mobiliarioL/searchL', 'MobiliarioController::searchL');
