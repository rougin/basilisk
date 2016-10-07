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

        if (! file_exists($filePath)) {
            throw new InvalidArgumentException('File not found.');
        }

        $value = require $filePath;

        for ($i = 1; $i < count($arrayKeys); $i++) {
            $value = &$value[$arrayKeys[$i]];
        }

        return (empty($value)) ? $defaultValue : $value;
    }
}
