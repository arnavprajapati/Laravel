<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check for token in query string
        $token = $request->query('token');
        if ($token !== '123a') {
            // Custom error message if not authorized
            return $next($request)->setContent(view('outsider')->render());
        }
        return $next($request);
    }
}
