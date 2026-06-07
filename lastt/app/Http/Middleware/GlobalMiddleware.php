<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GlobalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $age = $request->query('age');
        if (!$age || $age < 18) {
            return response()->json([
                'error' => 'Access denied'
            ], 403);
        }
        return $next($request);
    }
}
