<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/landing', 'Home::landing');
$routes->get('/login', 'Home::login');
$routes->get('/about', 'Home::about');
$routes->get('/forum', 'Home::forum');
// Reviews submission
$routes->post('/submit_review', 'Reviews::store');
// Allow admins to delete reviews
$routes->post('reviews/delete/(:num)', 'Reviews::delete/$1');
$routes->get('/gallery', 'Home::gallery');
// AJAX endpoints for gallery edit/delete
$routes->post('/gallery/edit', 'Home::galleryEdit');
$routes->post('/gallery/delete', 'Home::galleryDelete');
// Add gallery item
$routes->post('/gallery/add', 'Home::galleryAdd');
$routes->get('/gameplay', 'Home::gameplay');
$routes->get('/content', 'Home::content');
// $routes->get('/registration','AccountController::registration');
// $routes->get('/store','AccountController::store');
$routes->match(['get', 'post'], '/registration', 'AccountController::registration');
$routes->match(['get', 'post'], '/store', 'AccountController::store');
$routes->match(['get', 'post'], '/verify', 'AccountController::verify');
$routes->get('/login', 'AccountController::index');
$routes->get('/logout', 'AccountController::logout');
$routes->get('/database', 'Home::database');
$routes->post('/updateProfile', 'AccountController::updateProfile');
