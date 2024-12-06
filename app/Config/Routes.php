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
