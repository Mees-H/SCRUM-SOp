<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next) {
        $role = strtolower( request()->user()->role );
        $allowed_roles = array_slice(func_get_args(), 0);

        if( in_array($role, $allowed_roles) ) {
            return $next($request);
        }
    
        throw new AuthorizationException('this page is not accessible to your role');
    }
}
