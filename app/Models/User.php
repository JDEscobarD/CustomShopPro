<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombreUs',
        'apellidosUs',
        'tipoDoc',
        'numDocu',
        'departamento_id',
        'ciudad_id',
        'direccion',
        'rol_id',
        'telefono',
        'email',
        'password',
    ];

    /**
     * Los atributos que deben estar ocultos para arreglos.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
