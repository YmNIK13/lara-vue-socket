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

Route::get('/', function () {
    $dataUrls = [
        [
            'title' => "Google",
            'url'   => 'google.com',
        ],
        [
            'title' => "Yahoo",
            'url'   => 'yahoo.com',
        ],
    ];

    //    dd($dataUrls);

    return view('welcome', [
        'dataUrls' => $dataUrls,
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


