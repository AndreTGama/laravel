<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class DiretorMiddleware
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
        if ($request->user() && $request->user()->tipo_user_id != 3)
        {
            return new Response(view('unauthorized')->with('role', 'Diretor'));
        }
        return $next($request);
    }
}
