<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Ciudad;
use App\Models\Rol;
use App\Models\TipoDocumento;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function create()
    {
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
        $roles = Rol::all();
        $tipos_documentos = TipoDocumento::all();
        
        return view('auth.register', compact('departamentos', 'ciudades', 'roles', 'tipos_documentos'));
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombreUs' => ['required', 'string', 'max:255'],
            'apellidosUs' => ['required', 'string', 'max:255'],
            'tipo_documento_id' => ['required', 'exists:tipo_documento,id'],
            'numDocu' => ['required', 'numeric', 'digits_between:6,15'],
            'ciudad_id' => ['required', 'exists:ciudades,id'],
            'direccion' => ['required', 'string', 'max:255'],
            'rol_id' => ['required', 'exists:rol,id'],
            'telefono' => ['required', 'regex:/^3\d{9}$/', 'size:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nombreUs' => $request->nombreUs,
            'apellidosUs' => $request->apellidosUs,
            'tipo_documento_id' => $request->tipo_documento_id,
            'numDocu' => $request->numDocu,
            'departamento_id' => $request->departamento_id,
            'ciudad_id' => $request->ciudad_id,
            'direccion' => $request->direccion,
            'rol_id' => $request->rol_id,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        
        // Auth::login($user);

        return redirect()->route('users');
    }
    
}
