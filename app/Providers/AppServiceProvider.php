<?php

namespace App\Providers;

use App\Models\Admin\Gsbmenu;
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
        View::composer("theme.lte.aside", function ($view) {
            $menus = Gsbmenu::getMenu(true);
            $view->with('menusComposer', $menus);
        });

        view()->share('theme', 'lte');
    }
}
