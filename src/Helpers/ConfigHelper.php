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
        $filePath  = base_path('app/config/' . $arrayKeys[0] . '.php');
        
        array_shift($arrayKeys);

        $arrayKey = implode('.', $arrayKeys);

        return file_contents($filePath, $arrayKey, $defaultValue);
    }

    /**
     * Returns the data from the specified file.
     *
     * @param  string $path
     * @param  string $item
     * @param  string $defaultValue
     * @return mixed
     */
    function file_contents($path, $item = null, $defaultValue = null)
    {
        if (! file_exists($path)) {
            throw new InvalidArgumentException('File not found.');
        }

        $keys  = array_filter(explode('.', $item));
        $count = count($keys);
        $value = require $path;

        if (count($keys) == 0) {
            return $value;
        }

        for ($i = 0; $i < $count; $i++) {
            $value = &$value[$keys[$i]];
        }

        return (empty($value)) ? $defaultValue : $value;
    }
}
