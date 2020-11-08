<?php

namespace App\Http\Middleware;

use Closure;

class PermissionSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->permission()) {
            return $next($request);
        } else {
            return redirect('/')->with('message', 'No tiene permiso para entrar aquí');
        }
    }

    private function permission()
    {
        return session()->get('rol_name') == 'superadmin';
    }
}
