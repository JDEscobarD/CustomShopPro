<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //paginador bootstrap
        Paginator::useBootstrap();

        //categorías en vistas específicas
        View::composer(
            ['dashboard.new-product', 'dashboard.edit-product', 'dashboard.products', 'dashboard.history'],
            function ($view) {
                $listCategories = Category::orderBy('nombre')->get();
                $view->with('listCategories', $listCategories);
            }
        );
    }
}
