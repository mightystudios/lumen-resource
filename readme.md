# README #

Lumen Resource is a package for the [Lumen](https://lumen.laravel.com) framework, giving developers a simple helper for creating resourceful routes, similar to its big sister Laravel.


## Requirements ##

* PHP 5.5.x
* Lumen 5.2.x


## How do I get set up? ##

Install the package using composer.
```
composer require laronic\lumen-resource
```

## The helper function ##

Once installed, you can then use a global helper function `resource`. 

This will setup a set of named resourceful routes for you, exposing the `@index, @show, @store, @update, @destroy` methods in a controller.

Use this in your routes file, to create resourceful routes, the function requires a `$path`, `$controller` and `$name` property, and an optional `$exclude` array.

- `$path` is the name which you will be used in your url 
  * e.g. `users` would crate `example.com/users`

- `$controller` is the class name which will be used for your resource routes.
  * e.g. `\App\Http\Controllers\UsersController::class`

- `$name` is a identifier for your route names, 
  * e.g. `api.users`. This will have `.index, .show, .store, .update, .destroy` appended to them, in order to uniquely name your routes.

- `$exclude` (default is empty) is a array of strings. Switch of a route being created by adding the resource slug to the array.
  * e.g. `['destroy']` will turn of the destroy route.


## Example Usage ##

```php
// app/Http/routes.php

resource('users', \App\Http\Controllers\UsersController::class, 'api.users', ['destroy']);
```


# CORS/OPTIONS Requests

To allowed OPTIONS requests used for CORS, register the OptionsRequestServiceProvider.

```php
// bootstrap/app.php

 $app->register(\Laronic\Lumen\Resource\Providers\OptionsRequestServiceProvider::class);
```

To accept CORS request enable the CorsMiddleware middleware class

```php
// bootstrap/app.php

 $app->routeMiddleware([
     'cors' => \Laronic\Lumen\Resource\Middleware\CorsMiddleware::class,
 ....
 ]);
 ```