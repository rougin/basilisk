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
    'base_url' => getenv('APP_URL'),

    /**
     * Environment used in the application.
     * It's either "development" or "production".
     *
     * @var string
     */
    'environment' => getenv('APP_ENVIRONMENT'),

    /**
     * The default timezone for the application.
     *
     * @var string
     */
    'timezone' => getenv('APP_TIMEZONE'),

    /**
     * The directory name which contains the template files.
     *
     * @var string
     */
    'views' => base_path('app/views'),

    /**
     * Contains the global variables provided by PHP. It was intended to be
     * separated in order for the developers to easily mock these variables.
     */
    'http' => array(
        /**
         * HTTP Cookies.
         *
         * @var array
         */
        'cookies' => $_COOKIE,

        /**
         * HTTP File Upload variables.
         *
         * @var array
         */
        'files' => $_FILES,

        /**
         * HTTP GET variables.
         *
         * @var array
         */
        'get' => $_GET,

        /**
         * HTTP POST variables.
         *
         * @var array
         */
        'post' => $_POST,

        /**
         * Server and execution environment information.
         *
         * @var array
         */
        'server' => $_SERVER,
    ),

    /**
     * Contains the listing of available HTTP routes from a class object.
     * It must be implemented in \Rougin\Slytherin\Routing\RouterInterface.
     *
     * @var \Rougin\Slytherin\Routing\RouterInterface
     */
    'router' => require base_path('src/Http/routes.php'),

    /**
     * A listing of middlewares available to be injected in routes.
     *
     * @var array
     */
    'middlewares' => require base_path('src/Http/middlewares.php'),

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
        'Skeleton\Integrations\ApplicationIntegration',
    ),
);
