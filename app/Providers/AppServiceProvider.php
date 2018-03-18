<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Type;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $types = Type::get();
        View::share('types', $types);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
