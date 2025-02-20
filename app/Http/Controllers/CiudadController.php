<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function getCiudadesByDepartamento($departamentoId)
    {
        // Obtener las ciudades relacionadas con el departamento
        $ciudades = Ciudad::where('departamento_id', $departamentoId)->get();

        // Devolver las ciudades como JSON
        return response()->json($ciudades);
    }
}