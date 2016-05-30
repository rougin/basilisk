<?php

if ( ! function_exists('config')) {
    /**
     * Gets the configuration from the specified file.
     * 
     * @param  string $key
     * @param  string $default
     * @return string
     */
    function config($key = null, $default = null)
    {
        $seperator = DIRECTORY_SEPARATOR;
        $directory = __DIR__ . $seperator . '..' . $seperator . 'app';
        $data = explode('.', $key);

        $file = $directory . $seperator . 'config' . $seperator . $data[0] . '.php';

        if ( ! file_exists($file)) {
            throw new InvalidArgumentException('File not found.');
        }

        if ($data[0] == $key) {
            return include $file;
        }

        $config = new Noodlehaus\Config($file);
        $key = str_replace($data[0] . '.', '', $key);

        return $config->get($key, $default);
    }
}

if ( ! function_exists('setHeaders')) {
    /**
     * Sets the specified headers from the configuration.
     * 
     * @param  array $server
     * @param  array $headers
     * @return void
     */
    function setHeaders(array $server, array $headers)
    {
        if (isset($server['HTTP_ORIGIN'])) {
            $allowedOrigins = implode(',', $headers['allowed_origins']);
            $supportsCredentials = json_encode($headers['support_credentials']);
            $maxAge = json_encode($headers['max_age']);

            header('Access-Control-Allow-Origin: ' . $allowedOrigins);
            header('Access-Control-Allow-Credentials: ' . $supportsCredentials);
            header('Access-Control-Max-Age: ' . $maxAge);
        }

        if ($server['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($server['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                $allowedMethods = implode(',', $headers['allowed_methods']);

                header('Access-Control-Allow-Methods: ' . $allowedMethods);
            }

            if (isset($server['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                $allowedHeaders = implode(',', $headers['allowed_headers']);

                header('Access-Control-Allow-Headers: ' . $allowedHeaders);
            }

            exit;
        }
    }
}
