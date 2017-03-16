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
     * The directory name which contains the template files.
     *
     * @var string
     */
    'views' => __DIR__ . '/../views',

    /**
     * The container to be used for setting up the dependencies.
     * It must be implemented in \Interop\Container\ContainerInterface.
     *
     * @var \Interop\Container\ContainerInterface
     */
    'container' => new Rougin\Slytherin\Container\VanillaContainer,

    /**
     * Contains the global variables provided by PHP. It was intended to be
     * separated in order for the developers to easily mock these variables.
     */
    'http' => array(
        'cookies' => $_COOKIE,
        'files'   => $_FILES,
        'get'     => $_GET,
        'post'    => $_POST,
        'server'  => $_SERVER,
    ),

    /**
     * Contains the listing of available HTTP routes from a class object.
     * It must be implemented in \Rougin\Slytherin\Routing\RouterInterface.
     *
     * @var \Rougin\Slytherin\Routing\RouterInterface
     */
    'router' => require __DIR__ . '/../../src/Http/routes.php',

    /**
     * A listing of middlewares available to be injected in routes.
     *
     * @var array
     */
    'middlewares' => require __DIR__ . '/../../src/Http/middlewares.php',

    /**
     * The list of integrations to be included in Slytherin core.
     *
     * @var array
     */
    'integrations' => array(
        // Slytherin Integrations
        'Rougin\Slytherin\Debug\ErrorHandlerIntegration',
        'Rougin\Slytherin\Http\HttpIntegration',
        'Rougin\Slytherin\Integration\ConfigurationIntegration',
        'Rougin\Slytherin\Middleware\MiddlewareIntegration',
        'Rougin\Slytherin\Routing\RoutingIntegration',
        'Rougin\Slytherin\Template\RendererIntegration',

        // Application Integrations
        'Skeleton\Integrations\EloquentIntegration',
        'Skeleton\Integrations\SkeletonIntegration',
    ),
);
