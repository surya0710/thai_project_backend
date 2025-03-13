<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\RechargeRequest;
use App\Models\Withdraw;

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
            $view->with('pendingWithrawRequest', $pendingWithrawRequest);
            $view->with('pendingRechargeRequest', $pendingRechargeRequest);
        });
    }
}
