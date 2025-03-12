<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCuentaBanco extends Model
{
    use HasFactory;

    protected $table = 'tipos_cuentas_bancos';
    protected $fillable = ['tipo_cuenta'];
}
