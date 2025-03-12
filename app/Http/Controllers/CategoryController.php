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


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        Category::create($validated);

        return redirect()->route('categories')->with('success', 'Categoría creada con éxito.');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('dashboard.update-category', compact('category'));
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);
        
        $category = Category::findOrFail($id);
        
        $category->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
        
        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('categories');
    }

    public function batchAction(Request $request)
    {
        $request->validate([
            'selected_ids' => 'required|array',
            'selected_ids.*' => 'exists:categories,id',
        ]);

        $selectedIds = $request->input('selected_ids');

        Category::whereIn('id', $selectedIds)->delete();

        return redirect()->route('categories')->with('success', 'Categorías eliminadas correctamente.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');  

        $categorias = Category::where('nombre', 'like', "%{$query}%")
            ->orWhere('descripcion', 'like', "%{$query}%")
            ->paginate(10);

        return view('dashboard.categories', compact('categorias'));
    }

    public function index()
    {
        $categorias = Category::paginate(10);
        return view('dashboard.categories', compact('categorias'));
    }
}
