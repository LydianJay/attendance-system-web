<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/',           'Login::index');
$routes->get('/dashboard', 'Dashboard::index');