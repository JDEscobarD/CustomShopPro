<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Rol;
use App\Models\TipoDocumento;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $tipos_documentos = TipoDocumento::all();
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
        $roles = Rol::all();

        return view('auth.edit-user', compact('user', 'tipos_documentos', 'departamentos', 'ciudades', 'roles'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        $request->validate([
            'nombreUs' => ['required', 'string', 'max:255'],
            'apellidosUs' => ['required', 'string', 'max:255'],
            'tipo_documento_id' => ['required', 'exists:tipo_documento,id'],
            'numDocu' => ['required', 'numeric', 'digits_between:6,15'],
            'departamento_id' => ['required', 'exists:departamentos,id'],
            'ciudad_id' => ['required', 'exists:ciudades,id'],
            'direccion' => ['required', 'string', 'max:255'],
            'rol_id' => ['required', 'exists:rol,id'],
            'telefono' => ['required', 'regex:/^3\d{9}$/', 'size:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios,email,' . $id], // Permite actualizar el mismo email sin error
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'nombreUs' => $request->input('nombreUs'),
            'apellidosUs' => $request->input('apellidosUs'),
            'tipo_documento_id' => $request->input('tipo_documento_id'),
            'numDocu' => $request->input('numDocu'),
            'departamento_id' => $request->input('departamento_id'),
            'ciudad_id' => $request->input('ciudad_id'),
            'direccion' => $request->input('direccion'),
            'rol_id' => $request->input('rol_id'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();
        
        return redirect()->route('users');
    }

    public function papelera()
    {
        $usuarios = User::onlyTrashed()->get();

        return view('dashbaord.trash.user', compact('usuarios'));
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->route('dashbaord.trash.user');
    }

    public function index()
    {
        $usuarios = User::paginate(10);
        return view('dashboard.users', compact('usuarios'));
    }
}
