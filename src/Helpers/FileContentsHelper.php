<?php

if (! function_exists('file_contents')) {
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

        $keys  = explode('.', $item);
        $count = count($keys);
        $value = require $path;

        for ($i = 1; $i < $count; $i++) {
            $value = &$value[$keys[$i]];
        }

        return (empty($value)) ? $defaultValue : $value;
    }
}
