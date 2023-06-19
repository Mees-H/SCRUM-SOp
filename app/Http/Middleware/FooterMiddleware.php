<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Footer;

class FooterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $footer = Footer::all()->first();
        
        view()->share('secretariaat', $footer->secretariaat);
        view()->share('rekeningnummer', $footer->rekeningnummer);
        view()->share('KvKnr', $footer->KvKnr);
        view()->share('RSIN', $footer->RSIN);
        return $next($request);
    }
}
