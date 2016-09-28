<?php

/**
 * Configurations for Doctrine.
 *
 * @var array
 */
return [
    /**
     * If true, caching is done in memory with the ArrayCache.
     * Proxy objects are recreated on every request.
     *
     * If false, then proxy classes have to be explicitly created
     * through the command line.
     * @var boolean
     */
    'developer_mode' => env('ENVIRONMENT', 'production') == 'development',

    /**
     * Location of the Doctrine-based models.
     *
     * @var string
     */
    'model_paths'    => [ base('src/Models') ],

    /**
     * Location of the generated proxies for the models.
     *
     * @var string
     */
    'proxy_path'     => base('src/Proxies'),
];
