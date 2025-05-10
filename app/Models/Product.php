<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_regular',
        'precio_oferta',
        'composition_option_id',
        'format_id',
        'category_id',
        'unidades_disponibles',
        'imagen_portada',
        'url'
    ];

    // Relaciones
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    public function compositionOption()
    {
        return $this->belongsTo(CompositionType::class, 'composition_option_id');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function compositions()
    {
        return $this->hasMany(ProductComposition::class);
    }

    public function shipping()
    {
        return $this->hasOne(ProductShipping::class);
    }

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }
}
