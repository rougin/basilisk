<?php

use Rougin\Slytherin\Routing\Router;

/**
 * Returns an array of application configurations.
 *
 * @var array<string, mixed>
 */
return array(

    /**
     * Name of the application (e.g., "Slytherin).
     *
     * @var string
     */
    'name' => getenv('APP_NAME'),

    /**
     * Version number of the application (e.g., "v1.0.0").
     *
     * @var string
     */
    'version' => getenv('APP_VERSION'),

    /**
     * Specifies the URL for the root application. It is
     * recommended to specify this value from an ".env"
     * file for customizability (e.g., "http://roug.in").
     *
     * @var string
     */
    'base_url' => getenv('APP_URL'),

    /**
     * Environment used to the entire application. It is
     * recommended to specify this value from an ".env"
     * file for customizability (e.g., "development").
     * If the application is running in production, the
     * value of this should be updated to "production".
     *
     * @var string
     */
    'environment' => getenv('APP_ENVIRONMENT'),

    /**
     * Default timezone for the application. The value
     * specified in this property should be the same as
     * the timezone of its server (e.g., Asia/Manila).
     *
     * @var string
     */
    'timezone' => getenv('APP_TIMEZONE'),

    /**
     * Returns the global variables provided by PHP. It
     * is not recommended to use these variables directly
     * as it is challenging to mock them during testing.
     *
     * @var array<string, mixed>
     */
    'http' => array(

        /**
         * @var array<string, string>
         */
        'cookies' => $_COOKIE,

        /**
         * @var array<string, array<string, mixed>>
         */
        'files' => $_FILES,

        /**
         * @var array<string, mixed>
         */
        'get' => $_GET,

        /**
         * @var array<string, mixed>
         */
        'post' => $_POST,

        /**
         * @var array<string, mixed>
         */
        'server' => $_SERVER,

    ),

    /**
     * Returns an array of HTTP routes for the application.
     * Please see the @link below on how to create a simple
     * HTTP route and more from Slytherin's documentation.
     *
     * @link https://github.com/rougin/slytherin/wiki/Defining-HTTP-Routes
     *
     * @var \Rougin\Slytherin\Routing\RouterInterface
     */
    'router' => new Router,

    /**
     * Returns an array of HTTP middlwares that can be
     * injected to request and response of all available
     * HTTP routes. Please see the @link below to learn
     * more on its concepts and its provided examples.
     *
     * @link https://github.com/rougin/slytherin/wiki/Creating-Middlewares
     *
     * @var \Rougin\Slytherin\Middleware\MiddlewareInterface[]
     */
    'middlewares' => \App\Kernel::items(),

    /**
     * Returns an array of directory paths to be used for the
     * "RendererIntegration". To enable this property, kindly
     * add "Rougin\Slytherin\Template\RendererIntegration" to
     * the "packages" property within the core integrations.
     *
     * @link https://github.com/rougin/slytherin/wiki/Template
     *
     * @var string[]
     */
    'views' => array(

        __DIR__ . '/../plates',

    ),

    /**
     * Returns an array of integrations or packages that
     * will be attached to the Slytherin's system core.
     *
     * @var string[]
     */
    'packages' => array(

        /**
         * This section specifies the core integrations that are
         * required to run in Slytherin. The following will use
         * the defined HTTP variables, available HTTP routes, and
         * the specified HTTP middlewares (if they're available).
         */
        'Rougin\Slytherin\Http\HttpIntegration',
        'Rougin\Slytherin\Integration\ConfigurationIntegration',
        'Rougin\Slytherin\Middleware\MiddlewareIntegration',
        'Rougin\Slytherin\Routing\RoutingIntegration',
        'Rougin\Slytherin\Template\RendererIntegration',

        /**
         * This section specifies the custom packages that are
         * required to run this application. The "App\Package"
         * class will attach its own HTTP router to the system
         * core of Slytherin (e.g., \App\Router). Please see the
         *
         * @link below on how to create a package for Slytherin.
         * @link https://github.com/rougin/slytherin/wiki/IntegrationInterface-Implementation
         */
        'App\Package',

        /**
         * This section specifies the packages came from Weasley.
         * Please see Weasley's documentation for all of its
         * available packages and integrations that can be used.
         *
         * @link https://roug.in/weasley/
         */
        'Rougin\Weasley\Packages\Laravel\Eloquent',
        // 'Rougin\Weasley\Packages\Laravel\Blade',
    ),

);
