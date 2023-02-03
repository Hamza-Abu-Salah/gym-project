<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Corse;
use App\Models\Profile;
use App\Models\Schedule;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        View::share('profile',Profile::all());
        View::share('course',Corse::all());

        View::share('global_categories', Category::with('children')->whereNull('parent_id')->limit(4)->get());
    }
}
