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


/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index',);
$routes->get('/konsultasi',[PasienController::class,'index']);
$routes->post('/konsultasi',[PasienController::class,'store']);
$routes->get('/diagnosa',[DiagnosaController::class,'index']);
$routes->post('/diagnosa',[DiagnosaController::class,'store']);
$routes->post('/diagnosa/print',[DiagnosaController::class,'export']);

// Assuming you have a namespace set in your BaseController
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

    $routes->get('datadiagnosa', [DataDiagnosaController::class,'index']);
    $routes->put('datadiagnosa/update/(:any)',[DataDiagnosaController::class,'update']);
    $routes->post('datadiagnosa/store',[DataDiagnosaController::class,'store']);
    $routes->delete('datadiagnosa/delete/(:any)',[DataDiagnosaController::class,'destroy']);

    $routes->get('home', 'HomelaraController::index', ['as' => 'admin.home']);
});
