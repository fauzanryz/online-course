<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Kursus
$routes->get('/kursus', 'KursusController::index');
$routes->get('/kursus/add', 'KursusController::add');
$routes->post('/kursus/save', 'KursusController::save');
$routes->delete('/kursus/delete/(:num)', 'KursusController::delete/$1');
$routes->get('/kursus/edit/(:num)', 'KursusController::edit/$1');
$routes->post('/kursus/update/(:num)', 'KursusController::update/$1');
$routes->get('/kursus/detail/(:num)', 'MateriController::index/$1');

// Materi
$routes->get('/materi/add/(:num)', 'MateriController::add/$1');
$routes->post('/materi/save/(:num)', 'MateriController::save/$1');
$routes->delete('/materi/delete/(:num)', 'MateriController::delete/$1');
$routes->get('/materi/edit/(:num)', 'MateriController::edit/$1');
$routes->post('/materi/update/(:num)', 'MateriController::update/$1');
