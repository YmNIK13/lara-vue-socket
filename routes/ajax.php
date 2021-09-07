<?php


use Illuminate\Support\Facades\Route;


Route::get('/get-urls', [App\Http\Controllers\TableController::class, 'getUrls'])->name('getUrls');


Route::get('/get-data-chart', [App\Http\Controllers\ChartController::class, 'dataChart'])->name('dataChart');
Route::get('/get-data-random-chart', [App\Http\Controllers\ChartController::class, 'dataChartRandom'])->name('dataChartRandom');
Route::get('/get-data-chart-pie', [App\Http\Controllers\ChartController::class, 'dataChartPie'])->name('dataChartPie');
Route::get('/socket-chart', [App\Http\Controllers\ChartController::class, 'newEvent'])->name('newEvent');


Route::get('/send-message', [App\Http\Controllers\ChatController::class, 'sendMessage'])->name('sendMessage');

