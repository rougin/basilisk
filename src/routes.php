<?php

return [
    ['GET', '/', ['App\Http\Controllers\GreetController', 'index']],
    ['GET', '/greet/:name', ['App\Http\Controllers\GreetController', 'index']],
];