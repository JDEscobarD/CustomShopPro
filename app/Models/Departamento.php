<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos'; // Nombre de la tabla en la base de datos

    protected $fillable = ['nombre'];

    public function ciudades()
    {
        return $this->hasMany(Ciudad::class);
    }
}
