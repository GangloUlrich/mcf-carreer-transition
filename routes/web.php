<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('accueil');

Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth', 'checkUserStatus'])->group(function () {

Route::resource('secteurs',\App\Http\Controllers\Admin\SecteurController::class);
Route::resource('ecoles',\App\Http\Controllers\Admin\EcoleController::class);
Route::resource('ecoles.filieres',\App\Http\Controllers\Admin\FiliereController::class);

});

require __DIR__ . '/auth.php';
