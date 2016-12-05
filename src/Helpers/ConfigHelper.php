<?php

if (! function_exists('config')) {
    /**
     * Gets the configuration from the specified file.
     *
     * @param  string $key
     * @param  string $defaultValue
     * @return mixed
     */
    function config($key = null, $defaultValue = null)
    {
        $arrayKeys = explode('.', $key);
        $filePath  = base('app/config/' . $arrayKeys[0] . '.php');

        return file_contents($filePath, $key, $defaultValue);
    }
}
