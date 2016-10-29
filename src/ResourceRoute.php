<?php

if (!function_exists('resource')) {

    /**
     * Create a rest resource route
     *
     * @param $path
     * @param $controller
     * @param $name
     * @param array $exclude
     */
    function resource($path, $controller, $name, $exclude = [])
    {
        (new \Laronic\Lumen\Resource\Router())->add($path, $controller, $name, $exclude);
    }

} else {
    trigger_error("resource function already exists", E_USER_WARNING);
}