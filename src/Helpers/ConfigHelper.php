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
        $arrayKeys = explode('.', $key);
        $directory = base('app');
        $filePath  = $directory . '/config/' . $arrayKeys[0] . '.php';

        if ( ! file_exists($filePath)) {
            throw new InvalidArgumentException('File not found.');
        }

        if ($arrayKeys[0] == $key) {
            return include $filePath;
        }

        $config = new Noodlehaus\Config($filePath);
        $newKey = str_replace($arrayKeys[0] . '.', '', $key);

        return $config->get($newKey, $default);
    }
}
