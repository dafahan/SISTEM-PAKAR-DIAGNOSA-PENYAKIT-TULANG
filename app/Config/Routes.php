<?php

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Router\Route;
use App\Controllers\PasienController;
use App\Controllers\DiagnosaController;
use App\Controllers\PenyakitController;
use App\Controllers\DataGejalaController;
use App\Controllers\DataSolusiController;
use App\Controllers\DataPenyebabController;
use App\Controllers\DataPasienController;
use App\Controllers\DataDiagnosaController;
use App\Controllers\ArticleController;


/**
 * @var RouteCollection $routes
 */



$routes->get('/', 'Home::index',);
$routes->group('',['filter'=>'role:admin,user'],function ($routes){
$routes->get('/konsultasi',[PasienController::class,'index']);
$routes->post('/konsultasi',[PasienController::class,'store']);
$routes->get('/diagnosa',[DiagnosaController::class,'index']);
$routes->post('/diagnosa',[DiagnosaController::class,'store']);
$routes->get('/diagnosis',[DiagnosaController::class,'diagnosis']);
$routes->post('/diagnosa/print',[DiagnosaController::class,'export']);
$routes->get('/article/?(:any)/?(:any)', [ArticleController::class,'article']);
$routes->post('/article/?(:any)/?(:any)', [ArticleController::class,'prosess']);

});

$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
   
    $routes->get('datapenyakit', 'penyakitController::index');
    $routes->put('datapenyakit/update/(:any)',[PenyakitController::class,'update']);
    $routes->post('datapenyakit/store',[PenyakitController::class,'store']);
    $routes->delete('datapenyakit/delete/(:any)',[PenyakitController::class,'destroy']);


    $routes->get('datagejala', 'DataGejalaController::index');
    $routes->put('datagejala/update/(:any)',[DataGejalaController::class,'update']);
    $routes->post('datagejala/store',[DataGejalaController::class,'store']);
    $routes->delete('datagejala/delete/(:any)',[DataGejalaController::class,'destroy']);

    $routes->get('datasolusi', [DataSolusiController::class,'index']);
    $routes->put('datasolusi/update/(:any)',[DataSolusiController::class,'update']);
    $routes->post('datasolusi/store',[DataSolusiController::class,'store']);
    $routes->delete('datasolusi/delete/(:any)',[DataSolusiController::class,'destroy']);

    $routes->get('datapenyebab', [DataPenyebabController::class,'index']);
    $routes->put('datapenyebab/update/(:any)',[DataPenyebabController::class,'update']);
    $routes->post('datapenyebab/store',[DataPenyebabController::class,'store']);
    $routes->delete('datapenyebab/delete/(:any)',[DataPenyebabController::class,'destroy']);

    $routes->get('datapasien', [DataPasienController::class,'index']);
    $routes->put('datapasien/update/(:any)',[DatapasienController::class,'update']);
    $routes->post('datapasien/store',[DatapasienController::class,'store']);
    $routes->delete('datapasien/delete/(:any)',[DatapasienController::class,'destroy']);


    $routes->get('datapasien', [DataPasienController::class,'index']);
    $routes->put('datapasien/update/(:any)',[DatapasienController::class,'update']);
    $routes->post('datapasien/store',[DatapasienController::class,'store']);
    $routes->delete('datapasien/delete/(:any)',[DatapasienController::class,'destroy']);


    $routes->get('datadiagnosa', [DataDiagnosaController::class,'index']);
    $routes->put('datadiagnosa/update/(:any)',[DataDiagnosaController::class,'update']);
    $routes->post('datadiagnosa/store',[DataDiagnosaController::class,'store']);
    $routes->delete('datadiagnosa/delete/(:any)',[DataDiagnosaController::class,'destroy']);

    $routes->get('home', 'HomelaraController::index', ['as' => 'admin.home']);
});

use App\Auth as AuthConfig;

// Myth:Auth routes file.
$routes->group('', ['namespace' => 'App\Controllers'], static function ($routes) {
    // Load the reserved routes from Auth.php
    $config         = config(AuthConfig::class);
    $reservedRoutes = $config->reservedRoutes;

    // Login/out
    $routes->get($reservedRoutes['login'], 'AuthController::login', ['as' => $reservedRoutes['login']]);
    $routes->post($reservedRoutes['login'], 'AuthController::attemptLogin');
    $routes->get($reservedRoutes['logout'], 'AuthController::logout');

    // Registration
    $routes->get($reservedRoutes['register'], 'AuthController::register', ['as' => $reservedRoutes['register']]);
    $routes->post($reservedRoutes['register'], 'AuthController::attemptRegister');

    // Activation
    $routes->get($reservedRoutes['activate-account'], 'AuthController::activateAccount', ['as' => $reservedRoutes['activate-account']]);
    $routes->get($reservedRoutes['resend-activate-account'], 'AuthController::resendActivateAccount', ['as' => $reservedRoutes['resend-activate-account']]);

    // Forgot/Resets
    $routes->get($reservedRoutes['forgot'], 'AuthController::forgotPassword', ['as' => $reservedRoutes['forgot']]);
    $routes->post($reservedRoutes['forgot'], 'AuthController::attemptForgot');
    $routes->get($reservedRoutes['reset-password'], 'AuthController::resetPassword', ['as' => $reservedRoutes['reset-password']]);
    $routes->post($reservedRoutes['reset-password'], 'AuthController::attemptReset');
});
