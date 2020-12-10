<?php

namespace App\Http\Middleware;

use Closure;

use App\Helpers\JwtAuth;

class ApiAuth
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
        $hash = $request->header('Authorization', null);

        $jwtAuth = new JwtAuth();

        $checkToken = $jwtAuth->checkToken($hash);

        if (!$checkToken) {
            $data = array(
                'status' => 'error',
                'code' => '401',
                'message' => 'Acceso no autorizado'
            );
            return response()->json($data);
        }

        return $next($request);
    }
}
