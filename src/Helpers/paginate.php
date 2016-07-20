<?php

if ( ! function_exists('paginate')) {
    function paginate($data, $itemsPerPage = 20)
    {
        $adapter = new Pagerfanta\Adapter\ArrayAdapter($data);
        $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $pagerfanta = new Pagerfanta\Pagerfanta($adapter);
        $view = new Pagerfanta\View\TwitterBootstrap3View;

        $pagerfanta->setMaxPerPage($itemsPerPage);
        $pagerfanta->setCurrentPage($page);

        $routeGenerator = function ($page)
        {
            return request()->getUri()->getPath() . '?page=' . $page;
        };

        return [ $pagerfanta, $view->render($pagerfanta, $routeGenerator) ];
    }
}
