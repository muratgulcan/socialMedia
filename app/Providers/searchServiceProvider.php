<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Models\User;

class searchServiceProvider extends ServiceProvider
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
        view()->composer('app', function($view) {
            $users = User::get();
            $view->with('user', $users->users);
        });
    }
}
