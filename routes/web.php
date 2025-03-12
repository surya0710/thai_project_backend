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
        Route::get('/admin/list', 'App\Http\Controllers\UserController@adminList')->name('admin.list');
        Route::get('/admin/add', 'App\Http\Controllers\UserController@adminAdd')->name('admin.add');
        Route::get('/admin/edit/{user_id}', 'App\Http\Controllers\UserController@adminEdit')->name('admin.edit');
        Route::post('/admin/edit/{user_id}', 'App\Http\Controllers\UserController@adminUpdate')->name('admin.update');
        Route::post('/admin/delete', 'App\Http\Controllers\UserController@adminDelete')->name('admin.delete');
        Route::post('/admin/add', 'App\Http\Controllers\UserController@adminStore')->name('admin.store');
        Route::get('/user/list', 'App\Http\Controllers\UserController@userList')->name('user.list');
        Route::get('/user/edit', 'App\Http\Controllers\UserController@userEdit')->name('user.edit');
        Route::post('/user/list/{user_id}', 'App\Http\Controllers\UserController@userUpdateCreditPermission')->name('user.creditPermissionUpdate');
        Route::post('/user/delete', 'App\Http\Controllers\UserController@userDelete')->name('user.delete');
        Route::get('/lazada/list', 'App\Http\Controllers\UserController@lazadaList')->name('lazada.list');
        Route::get('/lazada/add', 'App\Http\Controllers\UserController@lazadaAdd')->name('lazada.add');
        Route::post('/lazada/add', 'App\Http\Controllers\UserController@lazadaStore')->name('lazada.store');
        Route::get('/recharge/list', 'App\Http\Controllers\UserController@rechargeList')->name('recharge.list');
        Route::get('/recharge/edit', 'App\Http\Controllers\UserController@rechargeEdit')->name('recharge.edit');
        Route::get('/withdrawal/list', 'App\Http\Controllers\UserController@withdrawalList')->name('withdrawal.list');
        Route::get('/profile', 'App\Http\Controllers\UserController@Profile')->name('profile');
        Route::post('/profile/{user_id}', 'App\Http\Controllers\UserController@ProfileUpdate')->name('profile.update');
        Route::get('/invitation/list', 'App\Http\Controllers\UserController@invitationList')->name('invitation.list');
        Route::post('invite-code', 'App\Http\Controllers\InvitationController@storeInviteCode')->name('invitation.store');
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

Route::get('/logout', 'App\Http\Controllers\AdminController@logout')->name('logout')->middleware('auth');