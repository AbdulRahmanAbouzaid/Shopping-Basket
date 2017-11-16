<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Repositories\Baskets;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('index', function($view){

            $products = \App\Product::all();
            
            foreach ($products as $product) {
               
               if(!$product->categories()->first()){
                    
                    $product->delete();
                }

            }

            $view->with(compact('products'));

        });

        view()->composer(['products.addProduct', 'products.update'], function($view){

            $categories = \App\Category::all();

            $view->with(compact('categories'));

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton(Baskets::class, function(){

        //     return new Baskets;

        // });
    }
}
