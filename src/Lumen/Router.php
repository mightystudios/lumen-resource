<?php

namespace Laronic\Lumen\Resource;

class Router
{
    protected $app;

    public function __construct()
    {
        global $app;
        $this->app = &$app;
    }

    /**
     * Create a rest resource route
     *
     * @param $path
     * @param $controller
     * @param $name
     * @param array $exclude
     */
    function add($path, $controller, $name, $exclude = [])
    {
        if (!(in_array('index', $exclude))) {
            $this->app->get($path, ['as' => $name . '.index', 'uses' => $controller . '@index']);
        }

        if (!(in_array('show', $exclude))) {
            $this->app->get($path . '/{id}', ['as' => $name . '.show', 'uses' => $controller . '@show']);
        }

        if (!(in_array('store', $exclude))) {
            $this->app->post($path, ['as' => $name . '.store', 'uses' => $controller . '@store']);
        }

        if (!(in_array('update', $exclude))) {
            $this->app->put($path . '/{id}', ['as' => $name . '.update', 'uses' => $controller . '@update']);
        }

        if (!(in_array('destroy', $exclude))) {
            $this->app->delete($path . '/{id}', ['as' => $name . '.destroy', 'uses' => $controller . '@destroy']);
        }

    }
}
