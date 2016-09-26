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
    'base_url' => env('base_url'),

    /**
     * Environment used in the application.
     * It's either "development" or "production".
     *
     * @var string
     */
    'environment' => env('environment'),

    /**
     * The default timezone for the application.
     *
     * @var string
     */
    'timezone' => env('timezone'),

    /**
     * The list of components to be integrated in Slytherin.
     *
     * @var array
     */
    'components' => [
        App\Components\BootstrapComponent::class,
        App\Components\DebuggerComponent::class,
        App\Components\DispatcherComponent::class,
        App\Components\DoctrineComponent::class,
        App\Components\HttpComponent::class,
        App\Components\MiddlewareComponent::class,
        App\Components\RepositoryComponent::class,
        App\Components\SerializerComponent::class,
    ]
];
