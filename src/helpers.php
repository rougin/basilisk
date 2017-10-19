<?php

// if (! function_exists('app')) {
//     /**
//      * Returns the available container instance.
//      *
//      * @param  string $key
//      * @return mixed
//      */
//     function app($key = null)
//     {
//         $container = \Rougin\Slytherin\Application::container();
 
//         return (is_null($key)) ? $container : $container->get($key);
//     }
// }

// if (! function_exists('config')) {
//     /**
//      * Gets the configuration from the specified file.
//      *
//      * @param  string      $key
//      * @param  string|null $default
//      * @return mixed
//      */
//     function config($key, $default = null)
//     {
//         $config = app('Rougin\Slytherin\Integration\Configuration');

//         return $config->get($key, $default);
//     }
// }

if (! function_exists('path')) {
    /**
     * Returns the base path of the application.
     *
     * @param  string|null $item
     * @return string
     */
    function path($item = null)
    {
        $item = str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, $item);

        return str_replace('src', '', __DIR__) . $item;
    }
}
