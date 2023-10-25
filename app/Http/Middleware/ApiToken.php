<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiToken
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('x-api-key') != config('envAccess.ACCESS_API_KEY')) {

            return response()->json([
                'status' => false,
                'message' => 'Unauthorized',
                'data' => [],
            ], 401);
        }

        return $next($request);
    }
}
