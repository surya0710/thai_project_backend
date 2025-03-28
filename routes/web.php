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
    Route::post('/login', 'App\Http\Controllers\UserController@login')->name('userLogin');
    Route::get('/register', function () { return view('register'); })->name('register');
    Route::post('/register', 'App\Http\Controllers\UserController@register')->name('userRegister');
    Route::get('/forgetPassword', function () { return view('forgetPassword'); })->name('forgetPassword');
    Route::post('/checkInviteCode', 'App\Http\Controllers\InvitationController@checkInviteCode')->name('checkInviteCode');
});


Route::middleware(['admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('dashboard');
        Route::get('/admin/list', 'App\Http\Controllers\UserController@adminList')->name('admin.list');
        Route::get('/admin/add', 'App\Http\Controllers\UserController@adminAdd')->name('admin.add');
        Route::get('/admin/edit/{user_id}', 'App\Http\Controllers\UserController@adminEdit')->name('admin.edit');
        Route::post('/admin/edit/{user_id}', 'App\Http\Controllers\UserController@adminUpdate')->name('admin.update');
        Route::post('/admin/delete', 'App\Http\Controllers\UserController@adminDelete')->name('admin.delete');
        Route::post('/admin/add', 'App\Http\Controllers\UserController@adminStore')->name('admin.store');
        Route::post('/search/products', 'App\Http\Controllers\ProductsController@search')->name('fetchproducts');
        Route::get('/user/list', 'App\Http\Controllers\UserController@userList')->name('user.list');
        Route::post('/set-lucky-draw', 'App\Http\Controllers\UserController@setLuckyDraw')->name('admin.setLuckyDraw');
        Route::get('/user/edit/{user_id}', 'App\Http\Controllers\UserController@userEdit')->name('user.edit');
        Route::get('/user/view/{user_id}', 'App\Http\Controllers\UserController@userView')->name('user.view');
        Route::post('/user/edit/{user_id}', 'App\Http\Controllers\UserController@userUpdate')->name('user.update');
        Route::get('/user/task-history/{user_id}', 'App\Http\Controllers\UserController@userTaskHistory')->name('user.taskHistory');
        Route::get('/user/bank-details/{user_id}', 'App\Http\Controllers\UserController@bankDetails')->name('user.bankDetails');
        Route::post('/user/bank-details/{user_id}', 'App\Http\Controllers\UserController@updateBankDetails')->name('user.updateBankDetails');
        Route::get('/invitation/list', 'App\Http\Controllers\InvitationController@invitationList')->name('invitation.list');
        Route::post('/user/list/{user_id}', 'App\Http\Controllers\UserController@userUpdateCreditPermission')->name('user.creditPermissionUpdate');
        Route::get('/user/reset-tasks/{user_id}', 'App\Http\Controllers\UserController@resetUserTasks')->name('reset.userTasks');
        Route::post('/user/delete', 'App\Http\Controllers\UserController@userDelete')->name('user.delete');
        Route::get('/lazada/list', 'App\Http\Controllers\UserController@lazadaList')->name('lazada.list');
        Route::get('/luckydraw/list/{user_id}', 'App\Http\Controllers\UserController@luckydrawList')->name('luckydraw.list');
        Route::get('/luckydraw/edit/{id}', 'App\Http\Controllers\UserController@luckydrawEdit')->name('luckydraw.edit');
        Route::post('/luckydraw/edit/{id}', 'App\Http\Controllers\UserController@luckydrawUpdate')->name('luckydraw.update');
        Route::post('/luckydraw/delete', 'App\Http\Controllers\UserController@luckydrawDelete')->name('luckydraw.delete');
        Route::get('/lazada/edit/{product_id}', 'App\Http\Controllers\UserController@lazadaEdit')->name('lazada.edit');
        Route::post('/lazada/edit/{product_id}', 'App\Http\Controllers\UserController@lazadaUpdate')->name('lazada.update');
        Route::post('lazada/upload-products', 'App\Http\Controllers\UserController@uploadProducts')->name('lazada.upload');
        Route::get('/lazada/add', 'App\Http\Controllers\UserController@lazadaAdd')->name('lazada.add');
        Route::post('/lazada/add', 'App\Http\Controllers\UserController@lazadaStore')->name('lazada.store');
        Route::post('/lazada/delete', 'App\Http\Controllers\UserController@lazadaDelete')->name('lazada.delete');
        Route::get('/recharge/list', 'App\Http\Controllers\UserController@rechargeList')->name('recharge.list');
        Route::get('/recharge/edit', 'App\Http\Controllers\UserController@rechargeEdit')->name('recharge.edit');
        Route::post('/recharge/statusUpdate', 'App\Http\Controllers\UserController@rechargeStatusUpdate')->name('admin.rechargeStatus');
        Route::get('/withdrawal/list', 'App\Http\Controllers\UserController@withdrawalList')->name('withdrawal.list');
        Route::get('/withdrawal/view/{withdrawal_id}', 'App\Http\Controllers\UserController@withdrawalEdit')->name('withdrawal.view');
        Route::post('/withdrawal/statusUpdate', 'App\Http\Controllers\UserController@withdrawalStatusUpdate')->name('admin.withdrawalStatus');
        Route::get('/profile', 'App\Http\Controllers\UserController@Profile')->name('profile');
        Route::post('/profile', 'App\Http\Controllers\UserController@ProfileUpdate')->name('profile.update');
        Route::get('/invitation/list', 'App\Http\Controllers\InvitationController@invitationList')->name('invitation.list');
        Route::post('invite-code', 'App\Http\Controllers\InvitationController@storeInviteCode')->name('invitation.store');
        Route::get('/withdrawal/edit', 'App\Http\Controllers\UserController@withdrawalEdit')->name('withdrawal.edit');
        Route::post('/block-user', 'App\Http\Controllers\UserController@blockUser')->name('user.status');
        Route::get('/logout', 'App\Http\Controllers\AdminController@logout')->name('admin.logout');
        Route::post('admin/filter', 'App\Http\Controllers\FilterController@adminFilter')->name('admin.filter');
        Route::post('user/filter', 'App\Http\Controllers\FilterController@userFilter')->name('user.filter');
        Route::post('invitation/filter', 'App\Http\Controllers\FilterController@invitationFilter')->name('invitation.filter');
        Route::post('/lazada/filter', 'App\Http\Controllers\FilterController@lazadaFilter')->name('lazada.filter');
        Route::post('/withdrawal/filter', 'App\Http\Controllers\FilterController@withdrawalFilter')->name('withdrawal.filter');
        Route::post('/recharge/filter', 'App\Http\Controllers\FilterController@rechargeFilter')->name('recharge.filter');
    });
});

// Customer Routes (Only for Customers)
Route::middleware(['customer'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\CustomerController@dashboard')->name('customer.dashboard');
    Route::get('/tasks', 'App\Http\Controllers\CustomerController@tasks')->name('customer.tasks');
    Route::get('/automatic-order', 'App\Http\Controllers\OrderManagermentController@automaticOrder')->name('customer.automaticOrder');
    Route::post('/automatic-order/{task_id},{task_type}', 'App\Http\Controllers\OrderManagermentController@automaticOrderSubmit')->name('customer.automaticOrderSubmit');
    Route::get('/revenue-record', 'App\Http\Controllers\CustomerController@revenueRecord')->name('customer.revenueRecord');
    Route::get('/my-account', 'App\Http\Controllers\CustomerController@myAccount')->name('customer.myAccount');
    Route::get('/recharge', 'App\Http\Controllers\CustomerController@recharge')->name('customer.recharge');
    Route::post('/recharge', 'App\Http\Controllers\CustomerController@rechargeSubmit')->name('customer.rechargeSubmit');
    Route::get('/bank-details-list', 'App\Http\Controllers\CustomerController@bankDetailsList')->name('customer.bankDetailsList');
    Route::get('/bank-details', 'App\Http\Controllers\CustomerController@bankDetails')->name('customer.bankDetails');
    Route::post('/bank-details', 'App\Http\Controllers\CustomerController@bankDetailsSubmit')->name('customer.bankDetailsSubmit');
    Route::get('/withdrawal', 'App\Http\Controllers\CustomerController@withdrawal')->name('customer.withdrawal');
    Route::post('/withdrawal', 'App\Http\Controllers\CustomerController@withdrawalSubmit')->name('customer.withdrawalSubmit');
    Route::get('/recharge-&-withdraw-history', 'App\Http\Controllers\CustomerController@rechargeWithdrawalHistory')->name('customer.rechargeWithdrawalHistory');
    Route::get('/my-address', 'App\Http\Controllers\CustomerController@myAddress')->name('customer.myAddress');
    Route::get('/my-address/add', 'App\Http\Controllers\CustomerController@myAddressAdd')->name('address.add');
    Route::get('/my-address/edit', 'App\Http\Controllers\CustomerController@myAddressAdd')->name('address.edit');
    Route::post('/my-address/add', 'App\Http\Controllers\CustomerController@myAddressStore')->name('address.store');
    Route::get('/profile', 'App\Http\Controllers\CustomerController@profile')->name('customer.profile');
    Route::post('/profile', 'App\Http\Controllers\CustomerController@profileUpdate')->name('profile.store');
    Route::get('/change-password', 'App\Http\Controllers\CustomerController@changePassword')->name('customer.changePassword');
    Route::post('/change-password', 'App\Http\Controllers\CustomerController@changePasswordUpdate')->name('customer.passwordUpdate');
    Route::get('/transaction-password', 'App\Http\Controllers\CustomerController@transactionPassword')->name('customer.transactionPassword');
    Route::post('/transaction-password', 'App\Http\Controllers\CustomerController@transactionPasswordUpdate')->name('customer.transactionPasswordUpdate');
    Route::get('/levelUp', 'App\Http\Controllers\CustomerController@levelUp')->name('customer.levelUp');
    Route::get('/levelUp', 'App\Http\Controllers\CustomerController@leveledUp')->name('customer.leveledUp');
    Route::get('/introduction', function () {
        return view('customer.introduction');
    })->name('customer.introduction');
    Route::get('/logout', 'App\Http\Controllers\CustomerController@logout')->name('customer.logout');
});