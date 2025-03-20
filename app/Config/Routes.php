<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/works', 'UserWorksController::index');
$routes->get('/workdetail/(:num)', 'UserWorksController::showContent/$1');
$routes->get('/contact', 'HomeController::contact');
$routes->get('/about', 'HomeController::about');

$routes->get('content/(:num)', 'PageController::showContent/$1');

// Rute untuk admin (HARUS LOGIN kecuali login/register)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'AdminController::index'); // Dashboard hanya bisa diakses jika login
    $routes->get('works', 'PageController::index');
    $routes->post('create', 'PageController::create');
    $routes->get('edit/(:num)', 'PageController::edit/$1');
    $routes->post('update/(:num)', 'PageController::update/$1');
    $routes->get('delete/(:num)', 'PageController::delete/$1');
    $routes->post('upload-gallery', 'AdminController::uploadGallery');
    $routes->delete('delete-gallery/(:num)', 'AdminController::deleteGallery/$1');
    $routes->post('upload-team', 'AdminController::uploadTeam');
    $routes->delete('delete-team/(:num)', 'AdminController::deleteTeam/$1');
    $routes->post('update-video', 'AdminController::updateVideo');
});


// Login & Register (TIDAK memerlukan autentikasi)
$routes->get('login', 'AuthController::login', ['filter' => 'noauth']);
$routes->post('login', 'AuthController::processLogin', ['filter' => 'noauth']);

$routes->get('admin/login', 'AuthController::login', ['filter' => 'noauth']);
$routes->post('admin/login', 'AuthController::processLogin', ['filter' => 'noauth']);

$routes->get('admin/register', 'AuthController::register', ['filter' => 'noauth']);
$routes->post('admin/register', 'AuthController::processRegister', ['filter' => 'noauth']);

$routes->get('admin/logout', 'AuthController::logout');


