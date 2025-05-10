<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompositionType extends Model
{
    use HasFactory;
    protected $table = 'composition_types'; // Cambiar a nombre consistente
    protected $fillable = ['opcion'];
}
