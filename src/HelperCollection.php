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

        return $key === null ? $container : $container->get($key);
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

        $config = container((string) $class);

        return ! $key ? $config : $config->get($key, $default);
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
        $search = array('\\', (string) '/');

        $replace = DIRECTORY_SEPARATOR;

        $item = str_replace($search, $replace, $item);

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
        $url = $url[0] !== '/' ? '/' . $url : (string) $url;

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

        return $response->withStatus($status !== null ? $status : 200);
    }
}

if (! function_exists('session')) {
    /**
     * Returns the session key from SessionInterface.
     *
     * @param  string $key
     * @return mixed
     */
    function session($key = null)
    {
        $class = (string) 'Rougin\Weasley\Session\SessionInterface';

        $session = container()->has($class) ? container($class) : config();

        return $key === null ? $session : $session->get((string) $key);
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

        $exists === false || session()->delete('flash');

        return $view;
    }
}
