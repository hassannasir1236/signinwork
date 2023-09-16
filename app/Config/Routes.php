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
//$routes->post('/user/delete/(:num)', 'Home/delete/$1');
// Correct route handler with the backslash delimiter
$routes->post('user/delete/(:num)', '\App\Controllers\Home::delete/$1');
$routes->get('user/edit/(:num)', '\App\Controllers\Home::editpageshow/$1');
$routes->post('user/editrecord/(:num)', '\App\Controllers\Home::EditRecord/$1');

// Define a POST route for deleting a record
//$routes['user/delete/(:num)']['post'] = 'Home/delete/$1';

// Correct route definition
//$route['user/delete/(:num)'] = 'Home/delete/$1';

// application/config/routes.php
//$route['user/delete/(:num)'] = 'Home/delete/$1';


