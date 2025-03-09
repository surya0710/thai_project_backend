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

Route::group(['middleware' => 'guest'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'App\Http\Controllers\AdminController@index')->name('loginView'); 
        Route::post('/', 'App\Http\Controllers\AdminController@login')->name('login');
    });

    Route::get('/', function () { return view('index'); })->name('index');
    Route::post('/', 'App\Http\Controllers\UserController@login')->name('userLogin');
    Route::get('/register', function () { return view('register'); })->name('register');
    Route::post('/register', 'App\Http\Controllers\UserController@register')->name('userRegister');
    Route::get('/forgetPassword', function () { return view('forgetPassword'); })->name('forgetPassword');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('dashboard');
        Route::get('admin-list', 'App\Http\Controllers\UserController@adminList')->name('admin.list');
        Route::get('/user-list', 'App\Http\Controllers\UserController@userList')->name('user.list');
        Route::get('/lazada-list', 'App\Http\Controllers\UserController@lazadaList')->name('lazada.list');
        Route::get('/lazada-add', 'App\Http\Controllers\UserController@lazadaAdd')->name('lazada.add');
        Route::get('/recharg-list', 'App\Http\Controllers\UserController@rechargeList')->name('recharge.list');
        Route::get('/withdrawal-list', 'App\Http\Controllers\UserController@withdrawalList')->name('withdrawal.list');
        Route::get('/profile', 'App\Http\Controllers\UserController@Profile')->name('profile');
    });
});

// Customer Routes (Only for Customers)
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\CustomerController@dashboard')->name('customer.dashboard');
    Route::get('/tasks', 'App\Http\Controllers\CustomerController@tasks')->name('customer.tasks');
    Route::get('/automatic-order', 'App\Http\Controllers\OrderManagermentController@automaticOrder')->name('customer.automaticOrder');
    Route::get('/revenue-record', 'App\Http\Controllers\CustomerController@revenueRecord')->name('customer.revenueRecord');
    Route::get('/my-account', 'App\Http\Controllers\CustomerController@myAccount')->name('customer.myAccount');
    Route::get('/recharge', 'App\Http\Controllers\CustomerController@recharge')->name('customer.recharge');
    Route::post('/recharge', 'App\Http\Controllers\CustomerController@rechargeSubmit')->name('customer.rechargeSubmit');
});