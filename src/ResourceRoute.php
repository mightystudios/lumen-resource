<?php

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
    global $app;

    if (!(in_array('index', $exclude))) {
        $app->get($path, ['as' => $name . '.index', 'use' => $controller . '@index']);
    }

    if (!(in_array('show', $exclude))) {
        $app->get($path . '/{id}', ['as' => $name . '.show', 'use' => $controller . '@show']);
    }

    if (!(in_array('store', $exclude))) {
        $app->post($path, ['as' => $name . '.store', 'use' => $controller . '@store']);
    }

    if (!(in_array('update', $exclude))) {
        $app->put($path . '/{id}', ['as' => $name . '.update', 'use' => $controller . '@update']);
    }

    if (!(in_array('destroy', $exclude))) {
        $app->delete($path . '/{id}', ['as' => $name . '.destroy', 'use' => $controller . '@destroy']);
    }

}