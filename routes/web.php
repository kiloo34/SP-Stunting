<?php

use Illuminate\Support\Facades\Route;

// Penyuluh
use App\Http\Controllers\Penyuluh\DashboardController as PenyuluhDashboard;

// Bidan
use App\Http\Controllers\Bidan\DashboardController as BidanDashboard;

// PKK
use App\Http\Controllers\PKK\DashboardController as PKKDashboard;

// Kader
use App\Http\Controllers\Kader\DashboardController as KaderDashboard;

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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::group([
        'prefix' => '/penyuluh',
        'middleware' => ['role:penyuluh'],
    ], function () {
        // Dashboard Route
        Route::get('/dashboard', [PenyuluhDashboard::class, 'index'])->name('penyuluh.dashboard');
    });
    
    Route::group([
        'prefix' => '/bidan',
        'middleware' => ['role:bidan'],
    ], function () {
        // Dashboard Route
        Route::get('/dashboard', [BidanDashboard::class, 'index'])->name('bidan.dashboard');
    });

    Route::group([
        'prefix' => '/pkk',
        'middleware' => ['role:pkk'],
    ], function () {
        // Dashboard Route
        Route::get('/dashboard', [PKKDashboard::class, 'index'])->name('pkk.dashboard');
    });
    
    Route::group([
        'prefix' => '/kader',
        'middleware' => ['role:kader'],
    ], function () {
        // Dashboard Route
        Route::get('/dashboard', [KaderDashboard::class, 'index'])->name('kader.dashboard');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');