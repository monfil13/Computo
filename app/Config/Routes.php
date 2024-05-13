<?php namespace Config;

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Router\Route;
use App\Http\Controllers\UserController;

/**
 * @var RouteCollection $routes
 */

    $routes->get('/', 'Home::inicio');

    $routes->get('/inicio', 'Home::ingresar');
    $routes->post('/login', 'Home::login');
    $routes->get('/salir', 'Home::salir');
    
    $routes->get('/', 'Home::salir');
    
    $routes->get('users', 'UserController::index');
    $routes->post('users/store', 'UserController::store');
    $routes->get('users/delete/(:num)', 'UserController::delete/$1');
    $routes->post('users/update', 'UserController::update');
    
    $routes->get('proveedores', 'ProveedoresController::index');
    $routes->post('proveedores/store', 'ProveedoresController::store');
    $routes->post('proveedores/update', 'ProveedoresController::update');
    $routes->get('proveedores/delete/(:num)', 'ProveedoresController::delete/$1');
    
    $routes->get('equipos', 'EquipoController::index');
    $routes->post('equipos/store', 'EquipoController::store');
    $routes->post('equipos/update', 'EquipoController::update');
    $routes->get('equipos/delete/(:num)', 'EquipoController::delete/$1');
    
    $routes->get('mantenimiento', 'MantenimientoController::index');
    $routes->post('mantenimiento/store', 'MantenimientoController::store');
    $routes->post('mantenimiento/update', 'MantenimientoController::update');
    $routes->get('mantenimiento/delete/(:num)', 'MantenimientoController::delete/$1');
    
    $routes->get('mobiliario', 'MobiliarioController::index');
    $routes->post('mobiliario/store', 'MobiliarioController::store');
    $routes->post('mobiliario/update', 'MobiliarioController::update');
    $routes->get('mobiliario/delete/(:num)', 'MobiliarioController::delete/$1');



    $routes->get('/', 'Home::inicioL');
