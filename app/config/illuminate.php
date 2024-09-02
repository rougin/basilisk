<?php

/**
 * A listing of configurations for Illuminate components (Laravel).
 *
 * @return array<string, mixed>
 */
return array(
    /**
     * Available configurations for the View component.
     *
     * @link https://github.com/illuminate/view
     *
     * @var array
     */
    'view' =>
    [
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
    ],
);
