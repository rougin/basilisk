<?php

return [
    'support_credentials' => false,
    'allowed_origins' => [$_SERVER['HTTP_ORIGIN']],
    'allowed_headers' => [$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE'],
    'exposed_headers' => [],
    'max_age' => 0,
    'hosts' => [],
];