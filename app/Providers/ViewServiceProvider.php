<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\RechargeRequest;
use App\Models\Withdraw;
use App\Models\User;
use App\Models\Products;
use App\Models\TasksHistory;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $pendingRechargeRequest = RechargeRequest::where('status', 0)->count();
            $pendingWithrawRequest = Withdraw::where('status', 0)->count();
            $adminUsersCount = User::where('is_deleted', 0)->where('is_blocked', 0)->where('role', 'admin')->count();
            $customerUsersCount = User::where('is_deleted', 0)->where('is_blocked', 0)->where('role', 'customer')->count();
            $productsCount = Products::where('is_deleted', 0)->count();
            $view->with('pendingWithrawRequest', $pendingWithrawRequest);
            $view->with('pendingRechargeRequest', $pendingRechargeRequest);
            $view->with('adminUsersCount', $adminUsersCount);
            $view->with('customerUsersCount', $customerUsersCount);
            $view->with('productsCount', $productsCount);
        });
    }
}
