<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\PRCategory;

class CategoryServiceProvider extends ServiceProvider
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
        // 使用 view composer 綁定主分類資料到 navTop 視圖
        view()->composer('home.navTop', function ($view) {
            $categories = PRCategory::all();
            $view->with('categories', $categories);
        });
    }
}
