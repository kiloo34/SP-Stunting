<?php

use Illuminate\Support\Facades\Route;

// Penyuluh
use App\Http\Controllers\Penyuluh\DashboardController as PenyuluhDashboard;
use App\Http\Controllers\Penyuluh\CatinController as PenyuluhCatin;
use App\Http\Controllers\Penyuluh\UserController as PenyuluhUser;
use App\Http\Controllers\Penyuluh\TeamController as PenyuluhTeam;
use App\Http\Controllers\Penyuluh\CriteriaController as PenyuluhCriteria;

// Bidan
use App\Http\Controllers\Bidan\DashboardController as BidanDashboard;
use App\Http\Controllers\Bidan\CatinController as BidanCatin;

// PKK
use App\Http\Controllers\PKK\DashboardController as PKKDashboard;
use App\Http\Controllers\PKK\CatinController as PKKCatin;

// Kader
use App\Http\Controllers\Kader\DashboardController as KaderDashboard;
use App\Http\Controllers\Kader\CatinController as KaderCatin;

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
        'middleware' => ['role:Penyuluh'],
    ], function () {
        // Dashboard Route
        Route::get('/dashboard', [PenyuluhDashboard::class, 'index'])->name('penyuluh.dashboard.index');
        
        // Catin Route
        // Basic Route
        Route::resource('catin', PenyuluhCatin::class, [
            'as' => 'penyuluh'
        ]);
        Route::get('/catin/{catin}/team', [PenyuluhCatin::class, 'addTeam'])->name('penyuluh.addTeam');
        Route::put('/catin/{catin}/team', [PenyuluhCatin::class, 'updateTeam'])->name('penyuluh.updateTeam');
        // Data Route
        Route::get('ajax/catin', [PenyuluhCatin::class, 'getDataCatin'])->name('penyuluh.getDataCatin');
        Route::get('ajax/catin/desa', [PenyuluhCatin::class, 'getDataCatinDesa'])->name('penyuluh.getDataCatinDesa');
        Route::get('ajax/catin/status', [PenyuluhCatin::class, 'getDataCatinStatus'])->name('penyuluh.getDataCatinStatus');
        Route::get('ajax/catin/team', [PenyuluhCatin::class, 'getDataCatinTeam'])->name('penyuluh.getDataCatinTeam');
        Route::get('ajax/catin/team/{team}', [PenyuluhCatin::class, 'getDataCatinTeamId'])->name('penyuluh.getDataCatinTeamId');

        // User Route
        // Basic Route
        Route::resource('user', PenyuluhUser::class, [
            'as' => 'penyuluh'
        ]);
        // Data Route
        Route::get('ajax/user', [PenyuluhUser::class, 'getDataUser'])->name('penyuluh.getDataUser');
        Route::get('ajax/user/desa', [PenyuluhUser::class, 'getDataUserDesa'])->name('penyuluh.getDataUserDesa');
        Route::get('ajax/user/status', [PenyuluhUser::class, 'getDataUserRole'])->name('penyuluh.getDataUserRole');

        // Team Route
        // Basic Route
        Route::resource('team', PenyuluhTeam::class, [
            'as' => 'penyuluh'
        ]);
        // Data Route
        Route::get('ajax/team', [PenyuluhTeam::class, 'getDataTim'])->name('penyuluh.getDataTim');
        Route::get('ajax/team/{team}', [PenyuluhTeam::class, 'getDetailTimPendamping'])->name('penyuluh.getDetailTimPendamping');
        Route::post('ajax/team/{team}/{user}', [PenyuluhTeam::class, 'updateToTeam'])->name('penyuluh.updateToTeam');
        Route::delete('ajax/team/{team}/{user}/delete', [PenyuluhTeam::class, 'removeFromTeam'])->name('penyuluh.removeFromTeam');
        Route::get('ajax/user/team/list', [PenyuluhTeam::class, 'getDetailAnggotaPendamping'])->name('penyuluh.getDetailAnggotaPendamping');

        // Criteria Route
        // Basic Route
        Route::resource('criteria', PenyuluhCriteria::class, [
            'as' => 'penyuluh'
        ]);
        // Data Route
        Route::get('ajax/criteria', [PenyuluhCriteria::class, 'getCriteria'])->name('penyuluh.getCriteria');
    });
    
    Route::group([
        'prefix' => '/bidan',
        'middleware' => ['role:Bidan'],
    ], function () {
        // Dashboard Route
        Route::get('/dashboard', [BidanDashboard::class, 'index'])->name('bidan.dashboard.index');
        
        // Catin Route
        // Basic Route
        Route::resource('catin', BidanCatin::class, [
            'as' => 'bidan'
        ]);
        // Data Route
        Route::get('ajax/catin', [BidanCatin::class, 'getDataCatin'])->name('bidan.getDataCatin');
    });

    Route::group([
        'prefix' => '/pkk',
        'middleware' => ['role:PKK'],
    ], function () {
        // Dashboard Route
        Route::get('/dashboard', [PKKDashboard::class, 'index'])->name('pkk.dashboard.index');
        
        // Catin Route
        // Basic Route
        Route::get('/catin', [PKKCatin::class, 'index'])->name('pkk.catin.index');
        // Data Route
        Route::get('ajax/catin', [PKKCatin::class, 'getDataCatin'])->name('pkk.getDataCatin');
    });
    
    Route::group([
        'prefix' => '/kader',
        'middleware' => ['role:Kader'],
    ], function () {
        // Dashboard Route
        Route::get('/dashboard', [KaderDashboard::class, 'index'])->name('kader.dashboard.index');
        
        // Catin Route
        // Basic Route
        Route::get('/catin', [KaderCatin::class, 'index'])->name('kader.catin.index');
        // Data Route
        Route::get('ajax/catin', [KaderCatin::class, 'getDataCatin'])->name('kader.getDataCatin');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');