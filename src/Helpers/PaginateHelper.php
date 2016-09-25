<?php

if ( ! function_exists('paginate')) {
    /**
     * Paginates the list of data.
     *
     * @param  array   $data
     * @param  integer $itemsPerPage
     * @return array
     */
    function paginate($data, $itemsPerPage = 20)
    {
        $adapter     = new Pagerfanta\Adapter\ArrayAdapter($data);
        $bootstrap   = new Pagerfanta\View\TwitterBootstrap3View;
        $currentPage = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $pagerfanta  = new Pagerfanta\Pagerfanta($adapter);

        $pagerfanta->setMaxPerPage($itemsPerPage);
        $pagerfanta->setCurrentPage($currentPage);

        $route = function ($page)
        {
            $path = request()->getUri()->getPath();

            return $path . '?page=' . $page;
        };

        $view = $view->render($pagerfanta, $route);

        return [ $pagerfanta, $view ];
    }
}
