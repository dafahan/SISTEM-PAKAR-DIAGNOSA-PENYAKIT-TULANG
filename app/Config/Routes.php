<?php

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Router\Route;
use App\Controllers\PasienController;
use App\Controllers\DiagnosaController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index',);
$routes->get('/konsultasi',[PasienController::class,'index']);
$routes->post('/konsultasi',[PasienController::class,'store']);
$routes->get('/diagnosa',[DiagnosaController::class,'index']);
$routes->post('/diagnosa',[DiagnosaController::class,'store']);

// Assuming you have a namespace set in your BaseController
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
   
    $routes->resource('datapenyakit', 'penyakitController');
    $routes->resource('detailpenyakit', 'datadetailpenyakitController');
    $routes->resource('detailpenyakit_gejala', 'DPgejalaController');
    $routes->resource('detailpenyakit_penyebab', 'DPpenyebabController');
    $routes->resource('detailpenyakit_solusi', 'DPsolusiController');
    $routes->resource('datagejala', 'datagejalaController');
    $routes->resource('datapenyebab', 'datapenyebabController');
    $routes->resource('datasolusi', 'SolusiPenyakitController');
    $routes->resource('datapasien', 'datapasienController');
    $routes->resource('datadiagnosa', 'DataDiagnosaController');
    $routes->resource('datauser', 'Auth\RegisterController');
    
    $routes->get('home', 'HomelaraController::index', ['as' => 'admin.home']);
});
