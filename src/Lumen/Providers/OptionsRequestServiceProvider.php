<?php

namespace Laronic\Lumen\Resource\Providers;

use Illuminate\Support\ServiceProvider;

class OptionsRequestServiceProvider extends ServiceProvider
{
    /**
     * Expose and accept an options verb request
     */
    public function register()
    {
        $request = app('request');

        if ($request->getMethod() === 'OPTIONS') {
            app()->options($request->path(), function () use ($request) {
                $headers = [
                    'Access-Control-Allow-Origin' => '*',
                    'Access-Control-Allow-Methods' => 'HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS',
                    'Access-Control-Allow-Credentials' => 'true',
                    'Access-Control-Max-Age' => '86400',
                    'Access-Control-Allow-Headers' => $request->header('Access-Control-Request-Headers')
                ];
                return response()->json(['method' => 'OPTIONS'], 200, $headers);
            });
        }
    }
}
