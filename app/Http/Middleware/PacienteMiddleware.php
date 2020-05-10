<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class PacienteMiddleware
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
        if ($request->user() && $request->user()->userType != 'paciente')
        {
            return new Response(view('unauthorized')->with('role', 'paciente'));
        }


        return $next($request);
    }
}
