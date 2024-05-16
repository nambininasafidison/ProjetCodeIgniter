<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Back::index');
$routes->post('/connexion','UserController::connexion');
$routes->post('/inscription','UserController::inscription');
$routes->get('/UserController/connexion','UserController::index');
$routes->setAutoRoute(true);
