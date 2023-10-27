<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// group
$routes->group('admin', function ($routes) {
    $routes->get('/', 'Dashboard\Dashboard::index');
    $routes->get('post', 'Dashboard\Post::index');
});
