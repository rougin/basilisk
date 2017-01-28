<?php

/**
 * Configurations for your application.
 *
 * @var array
 */
return array(
    /**
     * Name of the application.
     *
     * @var string
     */
    'name' => getenv('APP_NAME'),

    /**
     * The URL of your application root.
     *
     * @var string
     */
    'base_url' => getenv('BASE_URL'),

    /**
     * Environment used in the application.
     * It's either "development" or "production".
     *
     * @var string
     */
    'environment' => getenv('ENVIRONMENT'),

    /**
     * The default timezone for the application.
     *
     * @var string
     */
    'timezone' => getenv('TIMEZONE'),

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
    'components' => array(
        'Skeleton\Components\BootstrapComponent',
        'Skeleton\Components\DebuggerComponent',
        'Skeleton\Components\DispatcherComponent',
        'Skeleton\Components\EloquentComponent',
        'Skeleton\Components\HttpComponent',
        'Skeleton\Components\MiddlewareComponent',
    )
);
