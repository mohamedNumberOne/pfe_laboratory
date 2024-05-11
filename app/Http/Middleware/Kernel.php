<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Autres middlewares globaux...
    ];

    protected $middlewareGroups = [
        'web' => [
            // Autres middlewares de la couche web...
        ],

        'api' => [
            // Autres middlewares de la couche API...
        ],
    ];

    protected $routeMiddleware = [
        'CheckIdLab' => \App\Http\Middleware\CheckIdLab::class,
        // Autres middlewares de route...
    ];
}
