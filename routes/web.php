<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/','App\Http\Controllers\AuthController@showLoginForm')->name('loginForm');
// Route::post('/login','App\Http\Controllers\AuthController@login')->name('login.post');
// Route::post('/register','App\Http\Controllers\AuthController@register')->name('register.post');
// Route::post('/logout','App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register','App\Http\Controllers\AuthController@register')->name('register.post');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::group(['middleware' => 'dynamic_db'], function () {
        Route::get('/business/setup', [BusinessController::class, 'create'])->name('business.setup');
        Route::post('/business/setup', [BusinessController::class, 'store'])->name('business.setup.store');
        
        // Protect clients route with business credentials check
        Route::middleware('has.business.credentials')->group(function() {
            Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
        });
    });
});

// For client logout
Route::post('/client/logout', [ClientController::class, 'logout'])->name('client.logout');

// For business logout
Route::post('/business/logout', [BusinessController::class, 'logout'])->name('business.logout');

