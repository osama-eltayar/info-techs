<?php

namespace App\Providers;

use App\Payment\HyperpayService;
use App\Payment\PaymentServiceInterface;
use App\Services\User\Session\SessionServiceInterface;
use App\Services\User\Session\Zoom\ZoomMeetingService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(SessionServiceInterface::class,ZoomMeetingService::class);
        $this->app->bind(PaymentServiceInterface::class,HyperpayService::class);
    }
}
