<?php

namespace App\Http\Middleware;

use App\Exceptions\TokenException;
use App\Models\User;
use Closure;

class TokenCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     * @throws TokenException
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('Token-Own');
        $user = User::query()->where('api_token', $token)->count();

        if ($user) {
            return $next($request);
        }

        throw new TokenException('Token required');
    }
}
