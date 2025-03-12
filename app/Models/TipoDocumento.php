<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'tipo_documento';
    protected $fillable = ['nombre'];

    public function usuarios()
    {
        return $this->hasMany(User::class, 'tipo_documento_id');//acá va la columna en la tabla que se almacenará
    }
}

