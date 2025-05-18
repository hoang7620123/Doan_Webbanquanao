<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Settings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

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
        view()->composer('frontend.layouts.header',function($view){
            $logo=DB::table('settings')->get();
            $discount=\DB::table('products')->where('status','1')->where('discount','>','0')->select('discount')->distinct()->get('discount');
            $category=Category::where('status','1')->where('is_parent','1')->limit(3)->get();
            $view->with('category',$category)->with('logo',$logo)->with('discount',$discount);
        });
        view()->composer('frontend.layouts.footer',function($view){
            $settings=Settings::first();
            $view->with('settings',$settings);
        });
        view()->composer('frontend.layouts.header',function($view){
            $newcart =session()->get('cart');
            $view->with('newcart',$newcart);
        });

        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }
}
