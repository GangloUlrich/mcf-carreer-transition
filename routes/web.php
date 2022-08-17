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


Route::post('/list/filieres',[\App\Http\Controllers\HomeController::class,'selectFilieres']);
Route::get('/user/{user}/',[\App\Http\Controllers\HomeController::class,'displayResume'])->name('displayResume');


Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth', 'checkUserStatus'])->group(function () {

Route::resource('secteurs',\App\Http\Controllers\Admin\SecteurController::class);
Route::resource('ecoles',\App\Http\Controllers\Admin\EcoleController::class);
Route::resource('ecoles.filieres',\App\Http\Controllers\Admin\FiliereController::class);

Route::get('scholars',[\App\Http\Controllers\Admin\ScholarController::class,'scholars'])->name('scholars');

});


Route::middleware('auth')->group(function(){
    Route::post('/user/{user}/updateresume',[\App\Http\Controllers\HomeController::class,'changeResume'])->name('changeResume');
    Route::get('/user/{user}/changeresume',[\App\Http\Controllers\HomeController::class,'changeResumeForm'])->name('changeResumeForm');

});

require __DIR__ . '/auth.php';
