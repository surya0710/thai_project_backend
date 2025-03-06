<?php

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

Route::get('/', function () {
    return view('index');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/', 'App\Http\Controllers\AdminController@index')->name('loginView'); 
    });
   
    Route::group(['middleware' => 'auth'], function () {
        Route::post('/', 'App\Http\Controllers\AdminController@login')->name('login');
        Route::get('/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('dashboard');
    });
});
