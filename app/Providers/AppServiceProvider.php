<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Type;
use App\Models\TrendingTrek;

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
        // Share navigation data with all views
        View::composer('*', function ($view) {
            $navTypes = Type::where('is_active', true)
                ->with(['trendingTreks' => function ($query) {
                    $query->where('is_active', true)
                          ->orderBy('priority', 'desc')
                          ->orderBy('title')
                          ->limit(10);
                }])
                ->orderBy('order')
                ->orderBy('name')
                ->get();

            $footerTrendingTreks = TrendingTrek::where('is_active', true)
                ->where('is_trending', true)
                ->orderBy('priority', 'desc')
                ->limit(6)
                ->get();

            $view->with(compact('navTypes', 'footerTrendingTreks'));
        });
    }
}
