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
    /**
     * Display the registration view.
     */
    public function create()
    {
        // Obtener los datos necesarios para los formularios
        $departamentos = Departamento::all();
        $ciudades = Ciudad::all();
        $roles = Rol::all();
        $tipos_documentos = TipoDocumento::all();
        
        return view('auth.register', compact('departamentos', 'ciudades', 'roles', 'tipos_documentos'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    
    public function store(Request $request): RedirectResponse
    {
        //dd($request->all()); // Verifica los datos recibidos
        
        $request->validate([
            'nombreUs' => ['required', 'string', 'max:255'],
            'apellidosUs' => ['required', 'string', 'max:255'],
            'tipo_documento_id' => ['required', 'exists:tipo_documento,id'], // Valida el campo tipo_documento_id
            'numDocu' => ['required', 'string', 'unique:usuarios,numDocu'],
            'departamento_id' => ['required', 'exists:departamentos,id'],
            'ciudad_id' => ['required', 'exists:ciudades,id'],
            'direccion' => ['required', 'string', 'max:255'],
            'rol_id' => ['required', 'exists:rol,id'],
            'telefono' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'nombreUs' => $request->nombreUs,
            'apellidosUs' => $request->apellidosUs,
            'tipo_documento_id' => $request->tipo_documento_id, // Almacena el campo tipo_documento_id
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
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    
}
