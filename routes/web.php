<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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

Route::get('/','App\Http\Controllers\AuthController@showLoginForm')->name('loginForm');
Route::post('/login','App\Http\Controllers\AuthController@login')->name('login.post');
Route::post('/register','App\Http\Controllers\AuthController@register')->name('register.post');
Route::post('/logout','App\Http\Controllers\AuthController@logout')->name('logout');

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::group(['middleware' => 'dynamic_db'], function () {
        Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

        // Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    });
});

