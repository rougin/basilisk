<?php

/**
 * Returns an array of configurations related to Laravel.
 * These are being used on Laravel packages under Weasley.
 *
 * @return array<string, mixed>
 */
return array(

    /**
     * Available configurations for Laravel Blade.
     *
     * @link https://github.com/illuminate/view
     *
     * @var array<string, string>
     */
    'view' => array(

        /**
         * Path for the compiled view templates.
         *
         * @var string
         */
        'compiled' => __DIR__ . '/../cache/compiled',

        /**
         * Path for the view templates.
         *
         * @var string|string[]
         */
        'templates' => __DIR__ . '/../blades',

    ),

);
