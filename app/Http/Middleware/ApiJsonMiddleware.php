<?php

namespace App\Http\Middleware;

use Closure;

class ApiJsonMiddleware
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
        if ($request->header('Accept') == 'application/json'){
            return $next($request);
        }

        return response()->json([
            'error' => 'Required must has header application/json'
        ], 400);
    }
}
