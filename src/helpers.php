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
        $path = str_replace('src', '', __DIR__);

        return $path . $item;
    }
}

if (! function_exists('config')) {
    /**
     * Gets the configuration from the specified file.
     *
     * @param  string      $key
     * @param  string|null $defaultValue
     * @return mixed
     */
    function config($key, $defaultValue = null)
    {
        $config = app('Rougin\Slytherin\Integration\Configuration');

        return $config->get($key, $defaultValue);
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
     * @return void
     */
    function redirect($url)
    {
        $response = app('Psr\Http\Message\ResponseInterface');

        return $response->withStatus(302)->withHeader('Location', $url);
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
        return app('Psr\Http\Message\ServerRequestInterface');
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
        $flash  = array();

        $server = request()->getServerParams();

        $validator = new $validator;

        if (! $validator->validate($data)) {
            $flash['validation'] = $errors = $validator->errors;

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
    function view($template, $data = array())
    {
        $renderer = app('Rougin\Slytherin\Template\RendererInterface');

        if (class_exists('Twig_Environment')) {
            $twig = new Twig_Environment(new Twig_Loader_Filesystem(config('app.views')));

            $twig->addGlobal('request', request());

            $twig->addFunction(new Twig_SimpleFunction('config', 'config'));
            $twig->addFunction(new Twig_SimpleFunction('session', 'session'));
            $twig->addFunction(new Twig_SimpleFunction('url', 'url'));

            $renderer = new Rougin\Slytherin\Template\Twig\Renderer($twig);
        }

        return $renderer->render($template, $data);
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
