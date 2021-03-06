<?php

/**
 * A listing of configurations for Illuminate components.
 *
 * @return array
 */
return array(
    /**
     * Illuminate View
     *
     * @link https://github.com/illuminate/view
     *
     * @var array
     */
    'view' => array(
        /**
         * Path for the compiled view templates.
         *
         * @var string
         */
        'compiled' => path('app/cache/compiled'),

        /**
         * Path for the view templates.
         *
         * @var string|array
         */
        'templates' => (string) path('app/blades'),
    ),
);
