<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Slider;
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
        Paginator::useBootstrap();
        view()->composer(['livewire.home','livewire.user-dashboard-component','livewire.shop','livewire.brand-component','livewire.user.user-dashboard-component','livewire.admin.admin-dashboard-component','partial.header'], function ($view) {
            $view->with('categories', Category::all());
        });
        view()->composer(['livewire.home','livewire.user-dashboard-component','livewire.brand-component'], function ($view) {
            $view->with('sliders', Slider::all());
        });
        view()->composer(['livewire.home','livewire.user-dashboard-component','livewire.shop','livewire.detail-product-component','livewire.brand-component'], function ($view) {
            $view->with('popular_product', Product::orderBy('view','DESC')->paginate(5));
        });
        view()->composer(['livewire.home','livewire.user-dashboard-component','livewire.shop','livewire.detail-product-component','livewire.brand-component','livewire.admin.category-component'], function ($view) {
            $view->with('brands', Manufacturer::all());
        });
    }
}
