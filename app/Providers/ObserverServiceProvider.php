<?php

namespace App\Providers;

use App\Models\Profile;
use App\Observers\ProfileObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Profile::observe(ProfileObserver::class);
    }
}
