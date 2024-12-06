<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('welcome', 'Home::index');


$routes->get('auth', 'AuthController::index');
$routes->post('auth/validate_login', 'AuthController::validate_login');
$routes->post('auth/validate_register', 'AuthController::validate_register');


$routes->get('test', 'TestController::index');
$routes->get('showname/(:any)', 'Home::showname/$1');


$routes->get('dashboard', 'DasController::index');
$routes->post('addUser', 'DasController::addUser');
$routes->get('users', 'DasController::getUsers');



$routes->get('/da', 'DasController::index');


$routes->post('/logout', 'TacheController::logout');

$routes->get('/Tache', 'TacheController::index'); 
$routes->post('/Tache/createTask', 'TacheController::createTask'); 
$routes->get('/Tache/editTask/(:num)', 'TacheController::editTask/$1'); 
$routes->post('/Tache/updateTask/(:num)', 'TacheController::updateTask/$1'); 
$routes->post('/Tache/deleteTask/(:num)', 'TacheController::deleteTask/$1'); 



$routes->get('tache', 'TacheController::index');
$routes->get('goals', 'GoalController::index');



// Goal-related routes
$routes->get('/goal', 'GoalController::index'); 
$routes->post('/goal/create', 'GoalController::createGoal'); 
$routes->get('/goal/delete/(:num)', 'GoalController::deleteGoal/$1'); 
$routes->post('/goal/create', 'GoalController::createGoal');
$routes->post('goal/toggle/(:num)', 'GoalController::toggleCompletion/$1');

$routes->get('/dashboard', 'DasController::index');
$routes->post('/addUser', 'DasController::addUser');
$routes->get('/editUser/(:num)', 'DasController::editUser/$1');
$routes->post('/updateUser/(:num)', 'DasController::updateUser/$1');
$routes->get('/deleteUser/(:num)', 'DasController::deleteUser/$1');
$routes->post('/updateUserRole/(:num)', 'DasController::updateUserRole/$1');
$routes->get('DasController/getRoleData', 'DasController::getRoleData');
$routes->get('auth/forgot_password', 'AuthController::forgot_password');
$routes->post('auth/process_forgot_password', 'AuthController::process_forgot_password');


$routes->get('/auth', 'AuthController::index');
$routes->post('/auth/validate_login', 'AuthController::validate_login');
$routes->post('/auth/validate_register', 'AuthController::validate_register');
$routes->get('/auth/forgot_password', 'AuthController::forgot_password');
$routes->post('/auth/process_forgot_password', 'AuthController::process_forgot_password');
$routes->get('/auth/reset_password/(:any)', 'AuthController::reset_password/$1');
$routes->post('/auth/process_reset_password', 'AuthController::process_reset_password');
