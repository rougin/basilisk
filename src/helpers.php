<?php

if (! function_exists('container')) {
    /**
     * Returns the available container instance.
     *
     * @param  string $key
     * @return mixed
     */
    function container($key = null)
    {
        $container = Rougin\Slytherin\Application::container();

        return (is_null($key)) ? $container : $container->get($key);
    }
}

if (! function_exists('config')) {
    /**
     * Gets the configuration from the specified file.
     *
     * @param  string|null $key
     * @param  string|null $default
     * @return mixed
     */
    function config($key = null, $default = null)
    {
        $class = 'Rougin\Slytherin\Integration\Configuration';

        $config = container($class);

        return (! $key) ? $config : $config->get($key, $default);
    }
}

if (! function_exists('path')) {
    /**
     * Returns the base path of the application.
     *
     * @param  string|null $item
     * @return string
     */
    function path($item = null)
    {
        $item = str_replace([ '\\', '/' ], DIRECTORY_SEPARATOR, $item);

        return str_replace('src', '', __DIR__) . $item;
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
        return response(302)->withHeader('Location', $url);
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
        return container('Psr\Http\Message\ServerRequestInterface');
    }
}

if (! function_exists('response')) {
    /**
     * Returns a \Psr\Http\Message\ResponseInterface instance.
     *
     * @param  integer|null $status
     * @return \Psr\Http\Message\ResponseInterface
     */
    function response($status = null)
    {
        $response = container('Psr\Http\Message\ResponseInterface');

        return $response->withStatus($status ? $status : 200);
    }
}

if (! function_exists('session')) {
    function session($key = null)
    {
        $class = 'Rougin\Weasley\Session\SessionInterface';

        $session = (container()->has($class)) ? container($class) : config();

        return (is_null($key)) ? $session : $session->get($key);
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
        $link = ($link[0] != '/') ? '/' . $link : $link;

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
    function view($template, $data = [])
    {
        $exists = method_exists(session(), 'delete');

        $interface = 'Rougin\Slytherin\Template\RendererInterface';

        $view = container($interface)->render($template, $data);

        ! $exists || session()->delete('flash');

        return $view;
    }
}
