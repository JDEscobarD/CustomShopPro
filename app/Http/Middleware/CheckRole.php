<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Manejar la solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) { // Usar Auth::check() en lugar de auth()->check()
            return redirect()->route('login'); // Redirigir al login si no está autenticado
        }

        // Obtener el usuario autenticado
        $user = Auth::user(); // Usar Auth::user() en lugar de auth()->user()

        // Verificar el rol del usuario
        if ($role === 'admin' && !$user->isAdmin()) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        if ($role === 'usuario' && !$user->isUsuario()) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}