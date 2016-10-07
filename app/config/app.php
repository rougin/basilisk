<?php

/**
 * Configurations for your application.
 *
 * @var array
 */
return [
    /**
     * The URL of your application root.
     *
     * @var string
     */
    'base_url' => env('BASE_URL', 'http://localhost:8000'),

    /**
     * Environment used in the application.
     * It's either "development" or "production".
     *
     * @var string
     */
    'environment' => env('ENVIRONMENT', 'production'),

    /**
     * The default timezone for the application.
     *
     * @var string
     */
    'timezone' => env('TIMEZONE', 'Asia/Manila'),

    /**
     * The container to be used for setting up the dependencies.
     * It must be implemented in Interop\Container\ContainerInterface.
     *
     * @var \Interop\Container\ContainerInterface
     */
    'container' => new Rougin\Slytherin\IoC\Vanilla\Container,

    /**
     * The list of components to be integrated in Slytherin.
     *
     * @var array
     */
    'components' => [
        'App\Components\BootstrapComponent',
        'App\Components\DebuggerComponent',
        'App\Components\DispatcherComponent',
        'App\Components\DoctrineComponent',
        'App\Components\HttpComponent',
        'App\Components\MiddlewareComponent',
        'App\Components\RepositoryComponent',
    ]
];
