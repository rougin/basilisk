<?php

return [
    [ 'GET', '/', [ 'App\Http\Controllers\WelcomeController', 'index' ], middleware() ],
    [ 'GET', '/hello/:name', [ 'App\Http\Controllers\WelcomeController', 'hello' ], middleware() ],
];
