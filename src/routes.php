<?php

return [
    ['GET', '/', ['App\Controllers\GreetController', 'index']],
    ['GET', '/greet/:name', ['App\Controllers\GreetController', 'index']],
];