<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/',                       'Login::index');
$routes->get('/dashboard',              'Dashboard::index');
$routes->get('/database/attendance',    'Attendance::index');
$routes->get('/report',                 'Report::index');


// Sign In
$routes->post('/login', 'Login::login');

$routes->post('/insert',    'Table::insert');