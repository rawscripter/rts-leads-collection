<?php

use App\Models\MotivationalQuote;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
//for clear site cache
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    return 'cache cleared';
});

Route::get('/motivational/quote', [\App\Http\Controllers\DashboardController::class, 'motivationalQuote']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/export/customers', [\App\Http\Controllers\CustomerController::class, 'exportData']);

    Route::get('/user/create', [\App\Http\Controllers\DashboardController::class, 'register'])->middleware('auth');

    Route::get('/get/dashboard/data', [\App\Http\Controllers\DashboardController::class, 'dashboardData']);
    Route::get('/dashboard/chart/data/2', [\App\Http\Controllers\DashboardController::class, 'pieChartData']);
    Route::get('/dashboard/chart/data/1', [\App\Http\Controllers\DashboardController::class, 'chartData']);
    Route::get('/customers/json/data', [\App\Http\Controllers\CustomerController::class, 'index']);
    Route::post('/customer/{customer}/delete', [\App\Http\Controllers\CustomerController::class, 'destroy']);
    Route::post('/customer/store', [\App\Http\Controllers\CustomerController::class, 'store']);
    Route::get('/customer/{customer}/get', [\App\Http\Controllers\CustomerController::class, 'show']);
    Route::post('/customer/{customer}/update', [\App\Http\Controllers\CustomerController::class, 'update']);


    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/{any}', function () {
        return view('layouts.admin.pages.dashboard');
    });
    Route::get('/{any}/{any1}', function () {
        return view('layouts.admin.pages.dashboard');
    });
    Route::get('/{any}/{any1}/{any2}', function () {
        return view('layouts.admin.pages.dashboard');
    });

});

