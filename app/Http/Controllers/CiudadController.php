<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    // Método para obtener las ciudades por departamento
    public function ciudadesPorDepartamento($departamentoId)
    {
        
        $departamento = Departamento::find($departamentoId);
        
        if (!$departamento) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }
        
        $ciudades = $departamento->ciudades;
        
        return response()->json($ciudades);
    }
}
