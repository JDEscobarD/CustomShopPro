<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CompositionType;
use App\Models\Format;
//Acá se irán cargando los modelos y/o controladores a medida que se vayan creando

class ProductsController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('nombre_categoria')->get();
        $compositionTypes = CompositionType::orderBy('tipo_composicion')->get();
        $formats = Format::orderBy('formato')->get();
        return view('dashboard.new-product', compact('categories', 'compositionTypes', 'formats'));
    }
}
