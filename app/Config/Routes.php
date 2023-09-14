<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/signup', 'Home::signup');
$routes->post('/register','Home::register');
$routes->post('/', 'Home::authenticate');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/logout', 'Home::logout');
$routes->get('/toaster', 'Home::toaster');
$routes->post('/image-upload/upload', 'Home::upload');
