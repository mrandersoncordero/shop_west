<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (!Auth::check()) {
            // El usuario no está autenticado, puedes manejarlo como prefieras
            return redirect('/login');
        }

        
        $data_role = explode("|", $roles[0]);
        foreach ($data_role as $role) {
            if (Auth::user()->role->name === $role) {
                return $next($request);
            }
        }
        

        abort(403, 'Acceso no autorizado');
    }
}
