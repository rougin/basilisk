<?php

if (! function_exists('app')) {
    /**
     * Returns the available container instance.
     *
     * @param  string $key
     * @return mixed
     */
    function app($key = null)
    {
        $container = \Rougin\Slytherin\Application::container();

        return (is_null($key)) ? $container : $container->get($key);
    }
}

if (! function_exists('base_path')) {
    /**
     * Returns the base path of the application.
     *
     * @param  string|null $item
     * @return string
     */
    function base_path($item = null)
    {
        $item = str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, $item);

        return str_replace('src', '', __DIR__) . $item;
    }
}

if (! function_exists('config')) {
    /**
     * Gets the configuration from the specified file.
     *
     * @param  string      $key
     * @param  string|null $default
     * @return mixed
     */
    function config($key, $default = null)
    {
        $config = app('Rougin\Slytherin\Integration\Configuration');

        return $config->get($key, $default);
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
        $key = 'app.middlewares';

        return config(is_null($item) ? $key : $key . '.' . $item);
    }
}

if (! function_exists('redirect')) {
    /**
     * Returns a redirect response.
     *
     * @param  string $url
     * @return \Psr\Http\Message\ResponseInterface
     */
    function redirect($url)
    {
        $response = app('Psr\Http\Message\ResponseInterface');

        return $response->withStatus(302)->withHeader('Location', $url);
    }
}

if (! function_exists('request')) {
    /**
     * Returns a \Psr\Http\Message\ServerRequestInterface instance.
     *
     * @return \Psr\Http\Message\ServerRequestInterface
     */
    function request()
    {
        return app('Psr\Http\Message\ServerRequestInterface');
    }
}

if (! function_exists('response')) {
    /**
     * Returns a \Psr\Http\Message\ResponseInterface instance.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    function response()
    {
        return app('Psr\Http\Message\ResponseInterface');
    }
}

if (! function_exists('validate')) {
    /**
     * Validates the data from a specified validator.
     *
     * @param  string  $validator
     * @param  mixed   $data
     * @param  boolean $redirect
     * @return void|redirect
     */
    function validate($validator, $data, $redirect = true)
    {
        $errors = array();

        $flash = array();

        $validator = new $validator(new \Valitron\Validator);

        if (! $validator->validate($data)) {
            $errors = $validator->errors;

            $flash['validation'] = $errors;

            $flash['old'] = $data;
        }

        $response = redirect(config('app.http.server.HTTP_REFERER', '/'));

        return $redirect && ! empty($flash) ? $response : $errors;
    }
}

if (! function_exists('url')) {
    /**
     * Returns an URL with the specified link.
     *
     * @param  string|null $link
     * @return string
     */
    function url($link = null)
    {
        return config('app.base_url') . $link;
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
    function view($template, $data = array())
    {
        $renderer = app('Rougin\Slytherin\Template\RendererInterface');

        return $renderer->render($template, $data);
    }
}
