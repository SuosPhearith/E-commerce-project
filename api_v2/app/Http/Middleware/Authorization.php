<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Symfony\Component\HttpFoundation\Response;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (auth()->check()) {
            $role_id = auth()->user()->role_id;

            if (in_array($role_id, $roles)) {
                return $next($request);
            }
        }

        return response()->json(["error" => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    }
}
