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
        $data = explode('.', $key);

        if ($data[0] == 'app') {
            $data[0] = 'config';
        }

        $file = APP . '/' . $data[0] . '.php';

        if ( ! file_exists($file)) {
            throw new InvalidArgumentException('File not found.');
        }

        if ($data[0] == $key) {
            return include $file;
        }

        if ($data[0] == 'config') {
            $data[0] = 'app';
        }

        $config = new Noodlehaus\Config($file);
        $key = str_replace($data[0] . '.', '', $key);

        return $config->get($key, $default);
    }
}
