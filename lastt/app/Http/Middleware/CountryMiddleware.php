<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        $country = $request->query('country');
        if (!$country || $country !== 'india') {
            return response()->json([
                'error' => 'Access denied'
            ], 403);
        }
        return $next($request);
    }
}
