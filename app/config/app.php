<?php

/**
 * Configurations for the application.
 *
 * @var array<string, mixed>
 */
return array(
    /**
     * Name of the application.
     *
     * @var string
     */
    'name' => getenv('APP_NAME'),

    /**
     * Version number of the application, if applicable.
     *
     * @var string
     */
    'version' => getenv('APP_VERSION'),

    /**
     * The URL of the application root.
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
     * Contains the global variables provided by PHP. It was intended to be
     * separated in order for the developers to easily mock these variables.
     */
    'http' =>
    [
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
    ],

    /**
     * Contains the listing of available HTTP routes from a class object.
     * It must be implemented in \Rougin\Slytherin\Routing\RouterInterface.
     *
     * @var \Rougin\Slytherin\Routing\RouterInterface
     */
    'router' => new \App\Router,

    /**
     * A listing of middlewares available to be injected in all routes.
     *
     * @var array
     */
    'middlewares' => \App\Kernel::items(),

    /**
     * The list of packages to be included in the application.
     *
     * @var array
     */
    'packages' =>
    [
        // Slytherin Integrations ------------------------------
        'Rougin\Slytherin\Http\HttpIntegration',
        'Rougin\Slytherin\Integration\ConfigurationIntegration',
        'Rougin\Slytherin\Middleware\MiddlewareIntegration',
        'Rougin\Slytherin\Routing\RoutingIntegration',
        // -----------------------------------------------------

        // Application Packages
        'App\Package',

        // Weasley Packages
        'Rougin\Weasley\Packages\Laravel\Eloquent',
        'Rougin\Weasley\Packages\Laravel\Blade',
    ],
);
