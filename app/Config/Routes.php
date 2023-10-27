<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('post/(:segment)', 'Home::detail/$1');
$routes->get('about', 'About::index');
$routes->get('contact', 'Contact::index');

// group
$routes->group('auth', function ($routes) {
    $routes->get('/', 'Dashboard\Auth::index');
    $routes->post('login', 'Dashboard\Auth::login');
    $routes->post('logout', 'Dashboard\Auth::logout');
});

$routes->group('admin', ['filter' => 'dashboard'], function ($routes) {
    $routes->get('/', 'Dashboard\Dashboard::index');
    $routes->get('post', 'Dashboard\Post::index');
    $routes->get('post/add', 'Dashboard\Post::add');
    $routes->get('post/view/(:segment)', 'Dashboard\Post::view/$1');
    $routes->get('post/edit/(:segment)', 'Dashboard\Post::edit/$1');
    $routes->post('post/edit/update-status/(:segment)', 'Dashboard\Post::updateStatus/$1');
    $routes->post('post/store', 'Dashboard\Post::store');
    $routes->post('post/update/(:segment)', 'Dashboard\Post::update/$1');
    $routes->post('post/delete/(:segment)', 'Dashboard\Post::delete/$1');
});
