<?php

/**
 * A listing of available HTTP routes.
 *
 * @var array
 */
return [
    [ 'GET', '/', [ 'Skeleton\Http\Controllers\WelcomeController', 'index' ], middleware() ],
    [ 'GET', '/hello/:name', [ 'Skeleton\Http\Controllers\WelcomeController', 'hello' ], middleware() ],
];
