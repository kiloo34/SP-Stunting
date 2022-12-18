<?php

use Illuminate\Support\Facades\Route;

// Penyuluh
use App\Http\Controllers\Penyuluh\DashboardController as PenyuluhDashboard;
use App\Http\Controllers\Penyuluh\CatinController as PenyuluhCatin;
use App\Http\Controllers\Penyuluh\UserController as PenyuluhUser;
use App\Http\Controllers\Penyuluh\TeamController as PenyuluhTeam;
use App\Http\Controllers\Penyuluh\CriteriaController as PenyuluhCriteria;
use App\Http\Controllers\Penyuluh\ReportController as PenyuluhReport;
use App\Http\Controllers\Penyuluh\SpkController as PenyuluhSpk;

// Bidan
use App\Http\Controllers\Bidan\DashboardController as BidanDashboard;
use App\Http\Controllers\Bidan\CatinController as BidanCatin;
use App\Http\Controllers\Bidan\ReportController as BidanReport;

// PKK
use App\Http\Controllers\PKK\DashboardController as PKKDashboard;
use App\Http\Controllers\PKK\CatinController as PKKCatin;
use App\Http\Controllers\PKK\ReportController as PKKReport;

// Kader
use App\Http\Controllers\Kader\DashboardController as KaderDashboard;
use App\Http\Controllers\Kader\CatinController as KaderCatin;
use App\Http\Controllers\Kader\ReportController as KaderReport;

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
        Route::get('/kriteriaVal', [PenyuluhCatin::class, 'kriteriaVal'])->name('penyuluh.kriteriaVal');
        Route::get('/catin/{catin}/team', [PenyuluhCatin::class, 'addTeam'])->name('penyuluh.addTeam');
        Route::get('/catin/{catin}/value', [PenyuluhCatin::class, 'formValue'])->name('penyuluh.formValue');
        Route::post('/catin/{catin}/value', [PenyuluhCatin::class, 'storeValue'])->name('penyuluh.catin.storeValue');
        Route::put('/catin/{catin}/team', [PenyuluhCatin::class, 'updateTeam'])->name('penyuluh.updateTeam');
        // Data Route
        Route::get('ajax/catin', [PenyuluhCatin::class, 'getDataCatin'])->name('penyuluh.getDataCatin');
        Route::post('ajax/catin/umur', [PenyuluhCatin::class, 'countAge'])->name('penyuluh.countAge');
        Route::get('ajax/catin/desa', [PenyuluhCatin::class, 'getDataCatinDesa'])->name('penyuluh.getDataCatinDesa');
        Route::get('ajax/catin/status', [PenyuluhCatin::class, 'getDataCatinStatus'])->name('penyuluh.getDataCatinStatus');
        Route::get('ajax/catin/team', [PenyuluhCatin::class, 'getDataCatinTeam'])->name('penyuluh.getDataCatinTeam');
        Route::get('ajax/catin/team/{team}', [PenyuluhCatin::class, 'getDataCatinTeamId'])->name('penyuluh.getDataCatinTeamId');
        Route::put('ajax/catin/{catin}/active', [PenyuluhCatin::class, 'updateToActive'])->name('penyuluh.updateToActive');
        Route::put('ajax/catin/{catin}/disable', [PenyuluhCatin::class, 'updateToDisable'])->name('penyuluh.updateToDisable');

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
        Route::get('team/{team}/{village}', [PenyuluhTeam::class, 'showTeamVillage'])->name('penyuluh.showTeamVillage');
        // Data Route
        Route::get('ajax/team', [PenyuluhTeam::class, 'getDataTim'])->name('penyuluh.getDataTim');
        Route::get('ajax/team/{team}/{village}', [PenyuluhTeam::class, 'getDetailTimPendamping'])->name('penyuluh.getDetailTimPendamping');
        Route::post('ajax/team/{team}/{user}/{village}', [PenyuluhTeam::class, 'updateToTeam'])->name('penyuluh.updateToTeam');
        Route::delete('ajax/team/{team}/{user}/delete', [PenyuluhTeam::class, 'removeFromTeam'])->name('penyuluh.removeFromTeam');
        Route::get('ajax/user/team/{team}/list', [PenyuluhTeam::class, 'getDetailAnggotaPendamping'])->name('penyuluh.getDetailAnggotaPendamping');

        // Criteria Route
        // Basic Route
        Route::resource('criteria', PenyuluhCriteria::class, [
            'as' => 'penyuluh'
        ]);
        // Data Route
        Route::get('ajax/criteria', [PenyuluhCriteria::class, 'getCriteria'])->name('penyuluh.getCriteria');

        // Report Route
        // Basic Route
        Route::get('report', [PenyuluhReport::class, 'index'])->name('penyuluh.report.index');
        // Data Route

        // SPK Route
        // Basic Route
        Route::get('spk', [PenyuluhSpk::class, 'index'])->name('penyuluh.spk.index');
        // Data Route
        Route::get('ajax/spk/calculate', [PenyuluhSpk::class, 'calculate'])->name('penyuluh.spk.calculate');
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
        Route::get('/catin/{catin}/value', [BidanCatin::class, 'formValue'])->name('bidan.formValue');
        Route::post('/catin/{catin}/value', [BidanCatin::class, 'storeValue'])->name('bidan.catin.storeValue');
        // Data Route
        Route::get('ajax/catin', [BidanCatin::class, 'getDataCatin'])->name('bidan.getDataCatin');
        Route::post('ajax/catin/umur', [BidanCatin::class, 'countAge'])->name('bidan.countAge');

        // Report Route
        // Basic Route
        Route::resource('report', BidanReport::class, [
            'as' => 'bidan'
        ]);
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

        // Report Route
        // Basic Route
        Route::resource('report', PKKReport::class, [
            'as' => 'pkk'
        ]);
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
        
        // Report Route
        // Basic Route
        Route::resource('report', KaderReport::class, [
            'as' => 'kader'
        ]);
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');