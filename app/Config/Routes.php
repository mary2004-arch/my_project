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


$routes->get('dashboard', 'DasController::index');
$routes->post('addUser', 'DasController::addUser');
$routes->get('users', 'DasController::getUsers');





$routes->post('/logout', 'TacheController::logout');

$routes->get('/Tache', 'TacheController::index'); // Display tasks (personal and group)

$routes->post('/Tache/createTask', 'TacheController::createTask'); // Create a new task
$routes->get('/Tache/editTask/(:num)', 'TacheController::editTask/$1'); // Display edit form (GET)
$routes->post('/Tache/updateTask/(:num)', 'TacheController::updateTask/$1'); // Handle task update (POST)
$routes->post('/Tache/deleteTask/(:num)', 'TacheController::deleteTask/$1'); // Delete a task

$routes->get('goal', 'GoalController::index');                // Show all goals
$routes->post('goal/create', 'GoalController::createGoal');    // Add a new goal
$routes->get('goal/toggle/(:num)', 'GoalController::toggleCompletion/$1'); // Toggle completion status of a goal
$routes->get('goal/delete/(:num)', 'GoalController::deleteGoal/$1'); // Delete a goal

$routes->get('tache', 'TacheController::index');
$routes->get('goals', 'GoalController::index');




// Goal-related routes
$routes->get('/goal', 'GoalController::index'); // Show all goals
$routes->post('/goal/create', 'GoalController::createGoal'); // Add a new goal
$routes->get('/goal/toggle/(:num)', 'GoalController::toggleCompletion/$1'); // Toggle completion status of a goal
$routes->get('/goal/delete/(:num)', 'GoalController::deleteGoal/$1'); // Delete a goal
$routes->post('/goal/create', 'GoalController::createGoal');
$routes->post('goal/toggle/(:num)', 'GoalController::toggleCompletion/$1');
