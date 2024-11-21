<?php

use App\Controllers\Home;
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
$routes->get('/home/attendance', 'Home::absensi');
$routes->get('/home/report', 'Home::report');
$routes->get('/logout', 'Home::logout');
$routes->get('/api/login', 'ApiController::login');
$routes->post('api/register', 'ApiController::register');
$routes->post('/api/login', 'ApiController::login');
$routes->resource('employees', ['controller' => 'EmployeeController']);
$routes->get('api/employees', 'EmployeeController::index');   // Untuk menampilkan semua data
$routes->post('api/employees', 'EmployeeController::create');
$routes->get('api/employee/(:num)', 'EmployeeController::show/$1');  // Untuk menampilkan data berdasarkan id
$routes->put('api/employee/(:num)', 'EmployeeController::update/$1');  // Untuk mengubah data
$routes->delete('api/employees/(:num)', 'EmployeeController::delete/$1');
$routes->post('api/employees/bulk', 'EmployeeController::bulkInsert');
$routes->get('/api/employees/(:num)', 'EmployeeController::show/$1');
$routes->put('api/employees/(:num)', 'EmployeeController::update/$1');
$routes->group('attendance', function ($routes) {
    $routes->get('/', 'AttendanceController::index'); // Ambil semua data absensi
    $routes->get('(:num)', 'AttendanceController::show/$1'); // Ambil data absensi spesifik
    $routes->post('/', 'AttendanceController::create'); // Tambah data absensi baru
});
$routes->get('api/attendance', 'AttendanceController::index');
$routes->post('api/attendance/bulk', 'AttendanceController::createBulk');
$routes->post('api/attendance', 'AttendanceController::create');
$routes->get('api/attendance', 'AttendanceController::show/$1');
$routes->post('/report/generateReport', 'ReportController::generateReport');
$routes->get('/ReportController/getMonthlyAttendanceData', 'ReportController::getMonthlyAttendanceData');
$routes->get('/monthly-attendance-status', 'AttendanceController::getMonthlyAttendanceStatus');









// $routes->get('/home/forgot_password', 'Home::forgot_password');
// $routes->get('/forgot-password', 'ForgotPasswordController::index');
// $routes->post('/forgot-password', 'ForgotPasswordController::sendResetLink');
// $routes->get('/reset-password/(:any)', 'ForgotPasswordController::resetPassword/$1');
// $routes->post('/update-password', 'ForgotPasswordController::updatePassword');
