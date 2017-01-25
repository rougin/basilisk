<?php

if (! function_exists('base_path')) {
    /**
     * Returns the base path of the application.
     *
     * @param  string|null $item
     * @return string
     */
    function base_path($item = null)
    {
        $slash = DIRECTORY_SEPARATOR;

        $path = str_replace('src' . $slash . 'Helpers', '', __DIR__ . '/../');

        return $path . str_replace([ '\\', '/' ], $slash, $item);
    }
}

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
        $value = require $path;

        return get_value($keys, $value, $defaultValue);
    }

    /**
     * Returns the value from the specified array.
     *
     * @param  array      $keys
     * @param  mixed      $value
     * @param  mixed|null $defaultValue
     * @return mixed
     */
    function get_value($keys, $value, $defaultValue = null)
    {
        $count = count($keys);

        if (count($keys) == 0) {
            return $value;
        }

        for ($i = 0; $i < $count; $i++) {
            $value = &$value[$keys[$i]];
        }

        return (empty($value)) ? $defaultValue : $value;
    }
}

if (! function_exists('middleware')) {
    /**
     * Returns a listing of middleware/s.
     *
     * @param  string|null $item
     * @return mixed
     */
    function middleware($item = null)
    {
        return file_contents(base_path('src/Http/middlewares.php'), $item);
    }
}

if (! function_exists('redirect')) {
    /**
     * Returns a redirect response.
     *
     * @param  string  $url
     * @param  array   $data
     * @param  boolean $exit
     * @return void
     */
    function redirect($url, $data = [], $exit = true)
    {
        $url = ($url == '/') ? null : $url;

        session($data);

        $url = (strpos($url, 'http') === false) ? config('app.base_url') . '/' . $url : $url;

        header('Location: ' . $url);

        return ($exit) ? exit : null;
    }
}

if (! function_exists('request')) {
    /**
     * Returns an instance of a ServerRequest.
     *
     * @return \Psr\Http\Message\ServerRequestInterface
     */
    function request()
    {
        global $container;

        return $container->get('Psr\Http\Message\ServerRequestInterface');
    }
}

if (! function_exists('session')) {
    /**
     * Returns a value from $_SESSION variable.
     *
     * @param  array|string|null $variable
     * @param  mixed|null        $defaultValue
     * @return mixed
     */
    function session($variable = null, $defaultValue = null)
    {
        if (is_string($variable)) {
            $keys = explode('.', $variable);

            return get_value($keys, $_SESSION, $defaultValue);
        }

        if (is_array($variable)) {
            foreach ($variable as $key => $returnValue) {
                unset($_SESSION[$key]);

                if (! empty($returnValue)) {
                    $_SESSION[$key] = $returnValue;
                }
            }

            return null;
        }

        return $_SESSION;
    }
}

if (! function_exists('validate')) {
    /**
     * Validates the data from a specified validator.
     *
     * @param  string  $validatorName
     * @param  mixed   $data
     * @param  boolean $redirect
     * @return void|redirect
     */
    function validate($validatorName, $data, $redirect = true)
    {
        $errors = [];
        $flash  = [];

        $server = request()->getServerParams();

        $validator = new $validatorName;

        if (! $validator->validate($data)) {
            $flash['validation'] = $errors = $validator->getErrors();

            $flash['old'] = $data;
        }

        return $redirect && ! empty($flash) ? redirect($server['HTTP_REFERER'], $flash) : $errors;
    }
}

if (! function_exists('view')) {
    /**
     * Renders a view from a template.
     *
     * @param  string $template
     * @param  array  $data
     * @return string
     */
    function view($template, $data = [])
    {
        $renderer = new Rougin\Slytherin\Template\Vanilla\Renderer([ base_path('app/views') ]);

        if (class_exists('Twig_Environment')) {
            $twig = new Twig_Environment(new Twig_Loader_Filesystem(base_path('app/views')));

            $twig->addGlobal('request', request());
            $twig->addGlobal('session', session());

            $twig->addFunction(new Twig_SimpleFunction('config', 'config'));
            $twig->addFunction(new Twig_SimpleFunction('session', 'session'));
            $twig->addFunction(new Twig_SimpleFunction('url', 'url'));

            $renderer = new Rougin\Slytherin\Template\Twig\Renderer($twig);
        }

        session([ 'old' => null, 'validation' => null ]);

        return $renderer->render($template, $data);
    }
}

if (! function_exists('url')) {
    /**
     * Returns an URL with the specified link.
     *
     * @param  string $template
     * @param  array  $data
     * @return string
     */
    function url($link = null)
    {
        return config('app.base_url') . $link;
    }
}
