<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome']);

Route::get('/ajax/get-urls', [App\Http\Controllers\HomeController::class, 'getUrls'])->name('getUrls');
Route::get('/ajax/get-data-chart', [App\Http\Controllers\HomeController::class, 'dataChart'])->name('dataChart');
Route::get('/ajax/get-data-chart-pie', [App\Http\Controllers\HomeController::class, 'dataChartPie'])->name('dataChartPie');


