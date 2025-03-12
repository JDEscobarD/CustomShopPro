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

        if (!Auth::check()) { //Usar Auth::check() en lugar de auth()->check()
            return redirect()->route('login');
        }
        $user = Auth::user();
        if ($role === 'admin' && !$user->isAdmin()) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        if ($role === 'usuario' && !$user->isUsuario()) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}