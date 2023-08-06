<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Helper\CartHelper;
use App\Models\ConfigHome;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $config = ConfigHome::where('id', '=', 1)->first();
        View::share('config', $config);

        view()->composer('*', function ($view) {
            $view->with([
                'cart' => new CartHelper(),
                // 'config' => ConfigHome::where('id', '=', 1),
            ]);
        });
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
