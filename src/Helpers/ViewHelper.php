<?php

if ( ! function_exists('view')) {
    /**
     * Renders a view from a template.
     * 
     * @param  string $template
     * @param  array  $data
     * @return string
     */
    function view($template, $data = [])
    {
        $loader = new Twig_Loader_Filesystem(base('app/views'));
        $twig   = new Twig_Environment($loader);

        // Loads the filters
        $twig->addFilter(new Twig_SimpleFilter('url', 'url'));
        $twig->addFilter(new Twig_SimpleFilter('json', 'json'));

        // Loads the globals
        $twig->addGlobal('request', request());
        $twig->addGlobal('session', session());

        // Loads the functions
        $twig->addFunction(new Twig_SimpleFunction('carbon', 'carbon'));
        $twig->addFunction(new Twig_SimpleFunction('session', 'session'));

        $renderer = new Rougin\Slytherin\Template\Twig\Renderer($twig);

        session('validation', null, true);
        session('old', null, true);

        return $renderer->render($template, $data, 'twig');
    }
}
