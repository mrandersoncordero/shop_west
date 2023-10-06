<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Spatie\Permission\Traits\HasRoles;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
    if (!auth()->check()) {
        // El usuario no está autenticado, puedes manejarlo como prefieras
        return redirect('/login');
    }

    foreach ($roles as $role) {
        if (auth()->user()->hasRole($role)) {
            return $next($request);
        }else{
            return redirect('/');
        }
    }

    abort(403, 'Acceso no autorizado');
    }
}
