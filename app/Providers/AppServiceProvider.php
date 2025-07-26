<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        View::composer('*', function($view) {
            $view->with('menu_categories', Category::with('children')->whereNull('category_id')->get());
            $view->with('menu_tags', Tag::get());

             View::share('x', Order::all());
    View::share('y', Product::all());
    View::share('z', User::all());

        }); 
    }
}
