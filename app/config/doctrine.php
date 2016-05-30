<?php

$separator = DIRECTORY_SEPARATOR;
$base = __DIR__ . $separator . '..' . $separator;

return [
    'developer_mode' => true,
    'model_paths' => [ $base . 'src' . $separator . 'Models' ],
    'proxy_path' => $base . 'src' . $separator . 'Proxies',
];
