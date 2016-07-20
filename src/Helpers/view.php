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
        $views  = __DIR__ . '/../../app/views';
        $loader = new Twig_Loader_Filesystem($views);
        $twig   = new Twig_Environment($loader);

        $twig->addFilter(new Twig_SimpleFilter('url', 'url'));
        $twig->addFilter(new Twig_SimpleFilter('json', 'json'));

        $twig->addGlobal('request', request());
        $twig->addGlobal('session', $_SESSION);

        $twig->addFunction(new Twig_SimpleFunction('carbon', 'carbon'));
        $twig->addFunction(new Twig_SimpleFunction('session', 'session'));

        $renderer = new Rougin\Slytherin\Template\Twig\Renderer($twig);

        unset($_SESSION['validation']);
        unset($_SESSION['old']);

        return $renderer->render($template, $data, 'twig');
    }
}
