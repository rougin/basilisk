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

        if ($arrayKeys[0] == $key): return include $filePath; endif;

        $newKey = str_replace($arrayKeys[0] . '.', '', $key);

        return (new Noodlehaus\Config($filePath))->get($newKey, $defaultValue);
    }
}
