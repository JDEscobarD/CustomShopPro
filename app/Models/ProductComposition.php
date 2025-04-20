<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComposition extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'nombre_campo',
        'category_id',
        'articulo_id',
        'precio_adicional'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
