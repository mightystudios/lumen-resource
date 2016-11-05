<?php

namespace Laronic\Lumen\Resource;

use Illuminate\Support\ServiceProvider;

class OptionsRequestServiceProvider extends ServiceProvider
{
    public function register()
    {
        $request = app('request');
        if ($request->isMethod('OPTIONS')) {
            app()->options($request->path(), function () {
                return response('', 200);
            });
        }
    }
}