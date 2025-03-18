<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CompositionType;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Format;


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

        //Carga la lista de categorías en cualquier pantalla donde sean llamadas
        $listCategories = Category::orderBy('nombre')->get();
        View::share('listCategories', $listCategories);

        //Carga de tablas menores para la construcción de los productos
        View::composer(['dashboard.new-product'], function ($view) {
                $compositionTypes = CompositionType::orderBy('opcion')->get();
                $formats = Format::orderBy('formato')->get()->reverse();
                $view->with('listOptions', $compositionTypes)
                     ->with('formats', $formats);
            }
        );
    }
}
