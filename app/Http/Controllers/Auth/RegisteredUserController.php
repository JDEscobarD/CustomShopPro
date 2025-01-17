<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombreUs' => ['required', 'string', 'max:255'],
            'apellidosUs' => ['required', 'string', 'max:255'],
            'tipoDoc' => ['required', 'exists:tipo_documento,id'],
            'numDocu' => ['required', 'string', 'unique:users,numDocu'],
            'departamento_id' => ['required', 'exists:departamentos,id'],
            'ciudad_id' => ['required', 'exists:ciudades,id'],
            'direccion' => ['required', 'string', 'max:255'],
            'rol_id' => ['required', 'exists:roles,id'],
            'telefono' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nombreUs' => $request->nombreUs,
            'apellidosUs' => $request->apellidosUs,
            'tipoDoc' => $request->tipoDoc,
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
