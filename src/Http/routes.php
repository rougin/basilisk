<?php

return [
    [ 'GET', '/', [ 'App\Http\Controllers\WelcomeController', 'index' ], config('middlewares') ],
    [ 'GET', '/hello/:name', [ 'App\Http\Controllers\WelcomeController', 'hello' ], config('middlewares') ],
];
