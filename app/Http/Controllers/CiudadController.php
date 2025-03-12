<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function getCiudadesByDepartamento($departamentoId)
    {
        $ciudades = Ciudad::where('departamento_id', $departamentoId)->get();

        return response()->json($ciudades);
    }
}