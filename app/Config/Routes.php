<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/landing', 'Home::landing');
$routes->get('/login', 'Home::login');
$routes->get('/about', 'Home::about');
$routes->get('/content', 'Home::content');
$routes->get('/registration','Home::registration');
$routes->get('/database', 'UserControl::index');