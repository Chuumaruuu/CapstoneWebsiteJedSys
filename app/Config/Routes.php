<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/landing', 'Home::landing');
$routes->get('/login', 'Home::login');
$routes->get('/about', 'Home::about');
$routes->get('/gallery', 'Home::gallery');
$routes->get('/gameplay', 'Home::gameplay');
$routes->get('/content', 'Home::content');
// $routes->get('/registration','AccountController::registration');
// $routes->get('/store','AccountController::store');
$routes->match(['get', 'post'], '/registration', 'AccountController::registration');
$routes->match(['get', 'post'], '/store', 'AccountController::store');
$routes->get('/database', 'Home::database');