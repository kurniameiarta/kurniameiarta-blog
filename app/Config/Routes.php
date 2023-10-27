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
    $routes->get('post/add', 'Dashboard\Post::add');
    $routes->get('post/edit/(:segment)', 'Dashboard\Post::edit/$1');
    $routes->post('post/store', 'Dashboard\Post::store');
    $routes->post('post/update/(:segment)', 'Dashboard\Post::update/$1');
    $routes->post('post/delete/(:segment)', 'Dashboard\Post::delete/$1');
});
