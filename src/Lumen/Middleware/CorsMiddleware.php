<?php

namespace Laronic\Lumen\Resource\Middleware;

class CorsMiddleware
{

    public function handle($request, \Closure $next)
    {
        $response = $next($request);

        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Max-Age' => '86400',
            'Access-Control-Allow-Headers' => $request->header('Access-Control-Request-Headers')
        ];

        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }
}
