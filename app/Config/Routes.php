<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::login');
$routes->get('/signup', 'Home::signup');
$routes->get('/home/reset', 'Home::reset');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/home/employee', 'Home::employee');
$routes->get('/home/addemployee', 'Home::addemployee');
$routes->get('/logout', 'Home::logout');
$routes->get('/api/login', 'ApiController::login');
$routes->post('api/register', 'ApiController::register');
$routes->post('/api/login', 'ApiController::login');
// $routes->get('/home/forgot_password', 'Home::forgot_password');
// $routes->get('/forgot-password', 'ForgotPasswordController::index');
// $routes->post('/forgot-password', 'ForgotPasswordController::sendResetLink');
// $routes->get('/reset-password/(:any)', 'ForgotPasswordController::resetPassword/$1');
// $routes->post('/update-password', 'ForgotPasswordController::updatePassword');
