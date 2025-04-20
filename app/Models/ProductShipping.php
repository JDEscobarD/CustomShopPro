<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'envio_gratis',
        'costo_envio'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
