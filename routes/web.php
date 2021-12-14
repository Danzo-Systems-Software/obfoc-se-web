<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\reportTypesController;
use App\Http\Controllers\ReportController;
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

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::middleware(['can:isAdmin'])->group(function () {
        Route::resource('reportTypes', reportTypesController::class);
        Route::resource('reports', ReportController::class)->except(['show', 'create', 'store']);
    });
    Route::resource('reports', ReportController::class)->only(['show', 'create', 'store']);
});


Route::get('/banned', function () {
    return view("banned");
})->name('banned');

Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);

Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);
