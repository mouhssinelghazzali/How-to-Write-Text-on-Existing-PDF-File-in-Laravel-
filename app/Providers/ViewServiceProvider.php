<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\OrderComposer;


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
         // Use following code if you prefer to create a class
        // Based view composer otherwise use callback
    //    View::composer('order.list', OrderComposer::class);


        // Use following code if you want to use callback
        // Based view composer instead of class based view composer
        View::composer(['welcome','welcome2'], function ($view) {

            // following code will create $posts variable which we can use
            // in our post.list view you can also create more variables if needed
            $view->with('orders', Order::all());
    });
    
    }

}
