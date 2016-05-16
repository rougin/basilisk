<?php

$allowedHeaders = [];
$allowedOrigins = [];

if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
    $allowedHeaders[] = $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'];
}

if (isset($_SERVER['HTTP_ORIGIN'])) {
    $allowedOrigins[] = $_SERVER['HTTP_ORIGIN'];
}

return [
    'support_credentials' => false,
    'allowed_origins' => $allowedOrigins,
    'allowed_headers' => $allowedHeaders,
    'allowed_methods' => [ 'GET', 'POST', 'PUT', 'DELETE' ],
    'exposed_headers' => [],
    'max_age' => 0,
    'hosts' => [],
];