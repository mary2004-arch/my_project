<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('welcome', 'Home::index');
$routes->get('admin', 'AdminController::index');

// Route pour afficher la page d'authentification (login/signup)
$routes->get('auth', 'AuthController::index');

$routes->post('auth/validate_login', 'AuthController::validate_login');

$routes->post('auth/validate_register', 'AuthController::validate_register');


$routes->get('test', 'TestController::index');
$routes->get('da', 'DasController::index');

$routes->get('showname/(:any)', 'Home::showname/$1');


