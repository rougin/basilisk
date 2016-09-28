<?php

if (! function_exists('paginate')) {
    /**
     * Paginates the list of data.
     *
     * @param  array   $data
     * @param  integer $itemsPerPage
     * @return array
     */
    function paginate($data, $itemsPerPage = 20)
    {
        $get  = request()->getQueryParams();
        $view = new Pagerfanta\View\TwitterBootstrap3View;

        $adapter     = new Pagerfanta\Adapter\ArrayAdapter($data);
        $currentPage = (isset($get['page'])) ? $get['page'] : 1;
        $pagerfanta  = new Pagerfanta\Pagerfanta($adapter);

        $pagerfanta->setMaxPerPage($itemsPerPage);
        $pagerfanta->setCurrentPage($currentPage);

        $route = function ($page) {
            $path = request()->getUri()->getPath();

            return $path . '?page=' . $page;
        };

        return [ $pagerfanta, $view->render($pagerfanta, $route) ];
    }
}
