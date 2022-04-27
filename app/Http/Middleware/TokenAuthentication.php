<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class TokenAuthentication
{
    const ACCESS_TOKEN = '1kljlkn3ddll74licxzztlp';

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->bearerToken() == self::ACCESS_TOKEN) {
            return $next($request);
        }

        throw new UnauthorizedException('User not authenticated.', 401);
    }
}
