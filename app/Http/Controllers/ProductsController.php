<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Models\CompositionType;
use App\Models\Format;
use App\Models\ProductAttribute;
use App\Models\ProductComposition;
use App\Models\ProductShipping;
use App\Models\ProductGallery;

class ProductsController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('nombre_categoria')->get();
        $compositionTypes = CompositionType::orderBy('tipo_composicion')->get();
        $formats = Format::orderBy('formato')->get();
        return view('dashboard.new-product', compact('categories', 'compositionTypes', 'formats'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // 1. Store main product
            $product = Product::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio_regular' => $request->precio_regular,
                'precio_oferta' => $request->precio_oferta,
                'composition_option_id' => $request->composition_option_id,
                'format_id' => $request->format_id,
                'category_id' => $request->category_id,
                'unidades_disponibles' => $request->unidades_disponibles,
                'url' => $request->url
            ]);

            // 2. Handle cover image
            if ($request->hasFile('imagen_portada')) {
                $path = $request->file('imagen_portada')->store('products/covers', 'public');
                $product->imagen_portada = $path;
                $product->save();
            }

            // 3. Store attributes
            if ($request->has('attributes')) {
                foreach ($request->attributes as $attribute) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'nombre' => $attribute['nombre'],
                        'descripcion' => $attribute['descripcion']
                    ]);
                }
            }

            // 4. Store composition options
            if ($request->has('compositions')) {
                foreach ($request->compositions as $composition) {
                    ProductComposition::create([
                        'product_id' => $product->id,
                        'nombre_campo' => $composition['nombre_campo'],
                        'category_id' => $composition['category_id'],
                        'articulo_id' => $composition['articulo_id'],
                        'precio_adicional' => $composition['precio_adicional']
                    ]);
                }
            }

            // 5. Store shipping information
            ProductShipping::create([
                'product_id' => $product->id,
                'envio_gratis' => $request->envio_gratis ?? false,
                'costo_envio' => $request->costo_envio
            ]);

            // 6. Store gallery images
            if ($request->hasFile('gallery')) {
                foreach ($request->file('gallery') as $index => $image) {
                    $path = $image->store('products/gallery', 'public');
                    ProductGallery::create([
                        'product_id' => $product->id,
                        'imagen_url' => $path,
                        'orden' => $index
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('products.index')
                           ->with('success', 'Producto creado exitosamente');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error al crear el producto: ' . $e->getMessage())
                        ->withInput();
        }
    }
}
