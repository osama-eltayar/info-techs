<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('*', function ( $view ) {
            if ( Auth::check() )
                $view->with([
                    'favourite_courses_count' => Auth::user()->favouriteCourses()->count(),
                    'cart_courses_count'      => Auth::user()->shoppingCart()->count()
                ]);

        });
    }
}
