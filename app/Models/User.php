<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'usuarios';

    /**
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
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    // Validación de roles
    public function isAdmin()
    {
        return $this->rol_id === 1;
    }

    public function isUsuario()
    {
        return $this->rol_id === 2;
    }
    
    public function hasRole($roleId)
    {
        return $this->rol_id === $roleId;
    }
}

