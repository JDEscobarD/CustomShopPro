<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\CompositionType;
use App\Models\Format;

class ProductsController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('nombre')->get();
        $compositionOptions = CompositionType::orderBy('opcion')->get();
        $formats = Format::orderBy('formato')->get();
        $listCategories = Category::orderBy('nombre')->get();
        
        return view('dashboard.new-product', compact(
            'categories', 
            'compositionOptions',
            'formats',
            'listCategories'
        ));
    }

    public function store(Request $request)
    {
        $validationRules = [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio_regular' => 'required|numeric|min:0',
            'precio_oferta' => 'nullable|numeric|min:0',
            'composition_option_id' => 'required|exists:composition_options,id',
            'format_id' => 'required|exists:formats,id',
            'category_id' => 'required|exists:categories,id',
            'unidades_disponibles' => 'nullable|integer|min:0',
            'url' => 'nullable|url',
            'imagen_portada' => 'nullable|image|max:3000',
            'gallery.*' => 'nullable|image|max:3000',
            'attributes.*.nombre' => 'nullable|string',
            'attributes.*.descripcion' => 'nullable|string',
            'envio_gratis' => 'nullable|boolean',
            'costo_envio' => 'nullable|numeric|min:0'
        ];
    
        // Solo validar campos de composición si no es "NO" (ID 2)
        if ($request->composition_option_id != 2) {
            $validationRules['compositions.*.nombre_campo'] = 'nullable|string';
            $validationRules['compositions.*.category_id'] = 'nullable|exists:categories,id';
            $validationRules['compositions.*.articulo_id'] = 'nullable|exists:articulos,id';
            $validationRules['compositions.*.precio_adicional'] = 'nullable|numeric|min:0';
        }

        $validated = $request->validate($validationRules);

        try {
            DB::beginTransaction();

            $product = Product::create($validated);

            // Manejo de relaciones en métodos separados
            $this->handleAttributes($product, $request);
            $this->handleCompositions($product, $request);
            $this->handleShipping($product, $request);
            $this->handleGallery($product, $request);

            DB::commit();
            return redirect()->route('products.index')->with('success', 'Producto creado');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }

    private function handleAttributes(Product $product, Request $request)
    {
        if ($request->has('attributes')) {
            foreach ($request->input('attributes') as $attribute) {
                $product->attributes()->create([
                    'nombre' => $attribute['nombre'],
                    'descripcion' => $attribute['descripcion']
                ]);
            }
        }
    }

    private function handleCompositions(Product $product, Request $request)
    {
        if ($request->composition_option_id != 2 && $request->has('compositions')) { // Cambia 2 por el ID real de "NO"
            foreach ($request->input('compositions') as $composition) {
                $product->compositions()->create([
                    'nombre_campo' => $composition['nombre_campo'],
                    'category_id' => $composition['category_id'],
                    'articulo_id' => $composition['articulo_id'],
                    'precio_adicional' => $composition['precio_adicional']
                ]);
            }
        }
    }

    private function handleShipping(Product $product, Request $request)
    {
        $product->shipping()->create([
            'envio_gratis' => $request->input('envio_gratis', false),
            'costo_envio' => $request->input('costo_envio', 0)
        ]);
    }

    private function handleGallery(Product $product, Request $request)
    {
        if ($request->hasFile('imagen_portada')) {
            $path = $request->file('imagen_portada')->store('products', 'public');
            $product->update(['imagen_portada' => $path]);
        }

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $path = $image->store('products/gallery', 'public');
                $product->gallery()->create(['image_path' => $path]);
            }
        }
    }
}
