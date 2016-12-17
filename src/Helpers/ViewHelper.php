<?php

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
        $loader = new Twig_Loader_Filesystem(base_path('app/views'));
        $twig   = new Twig_Environment($loader);

        // Loads the filters
        $twig->addFilter(new Twig_SimpleFilter('url', function ($link = null) {
            return config('app.base_url') . $link;
        }));

        // Loads the globals
        $twig->addGlobal('request', request());
        $twig->addGlobal('session', session());

        // Loads the functions
        $twig->addFunction(new Twig_SimpleFunction('config', 'config'));
        $twig->addFunction(new Twig_SimpleFunction('carbon', 'carbon'));
        $twig->addFunction(new Twig_SimpleFunction('session', 'session'));

        $renderer = new Rougin\Slytherin\Template\Twig\Renderer($twig);

        session([ 'old' => null, 'validation' => null ]);

        return $renderer->render($template, $data, 'twig');
    }
}
