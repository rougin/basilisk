<?php

return [
    [ 'GET', '/', [ App\Http\Controllers\WelcomeController::class, 'index' ], config('middlewares') ],
    [ 'GET', '/hello/:name', [ App\Http\Controllers\WelcomeController::class, 'hello' ], config('middlewares') ],
];
