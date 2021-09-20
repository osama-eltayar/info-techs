<?php

namespace App\Providers;

use App\Payment\HyperpayService;
use App\Payment\PaymentServiceInterface;
use App\Services\User\Session\SessionServiceInterface;
use App\Services\User\Session\Zoom\ZoomMeetingService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(125 );

        $this->app->bind(SessionServiceInterface::class,ZoomMeetingService::class);
        $this->app->bind(PaymentServiceInterface::class,HyperpayService::class);
        if($this->app->environment('local'))
        {
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            Artisan::call('route:clear');
        }
    }
}
