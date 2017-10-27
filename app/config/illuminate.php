<?php

/**
 * A listing of configurations for Illuminate components.
 *
 * @return array
 */
return [
    /**
     * Illuminate View
     *
     * @link https://github.com/illuminate/view
     *
     * @var array
     */
    'view' => [
        /**
         * Path for the compiled view templates.
         *
         * @var string
         */
        'compiled' => __DIR__ . '/../storage/compiled',

        /**
         * Path for the view templates.
         *
         * @var string|array
         */
        'templates' => __DIR__ . '/../resources/views',
    ],
];
