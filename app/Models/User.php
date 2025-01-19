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
        'tipo_documento_id',
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

    // Relación con Departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    // Relación con Ciudad
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    // Relación con Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    // Relación con TipoDocumento
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }
}

