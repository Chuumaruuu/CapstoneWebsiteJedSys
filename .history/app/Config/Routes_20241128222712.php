<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/landing', 'Home::landing');
$routes->get('/about', 'Home::about');
$routes->get('/content', 'Home::content');
$routes->get('/database', 'UserControl::index');