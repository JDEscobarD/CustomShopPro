<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('dashboard.new-category');
    }

    /**
     * Guarda una nueva categoría en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        Category::create($validated);

        return redirect()->route('categories')->with('success', 'Categoría creada con éxito.');
    }

    public function index()
    {
        $categorias = Category::paginate(10);
        return view('dashboard.categories', compact('categorias'));
    }
}
