<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\RechargeRequest;
use App\Models\Withdraw;
use App\Models\User;
use App\Models\Products;
use App\Models\TasksHistory;
use Illuminate\Console\View\Components\Task;
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
            $todaysRevenue = TasksHistory::whereDate('created_at', date('Y-m-d'))->where('user_id', Auth::guard('customer')->user()->id)->sum('earned_amount');
            $yesterdayrevenue = TasksHistory::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->where('user_id', Auth::guard('customer')->user()->id)->sum('earned_amount');
            $view->with('pendingWithrawRequest', $pendingWithrawRequest);
            $view->with('pendingRechargeRequest', $pendingRechargeRequest);
            $view->with('adminUsersCount', $adminUsersCount);
            $view->with('customerUsersCount', $customerUsersCount);
            $view->with('productsCount', $productsCount);
            $view->with('todaysRevenue', $todaysRevenue);
            $view->with('yesterdayrevenue', $yesterdayrevenue);
        });
    }
}
