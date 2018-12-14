<?php

namespace App;

use Rougin\Slytherin\Routing\Router;

/**
 * Route Collection
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class RouteCollection extends Router
{
    /**
     * @var string
     */
    protected $namespace = 'App\Controllers\\';

    /**
     * @var string
     */
    protected $prefix = '';

    /**
     * Returns a listing of available routes.
     *
     * @param  boolean $parsed
     * @return array
     */
    public function routes($parsed = false)
    {
        $this->post('/auth/login', 'AuthController@login');

        $this->get('/auth/login', 'AuthController@login');

        $this->get('/', 'HomeController@index');

        $this->get('/auth/logout', 'AuthController@logout');

        return parent::routes($parsed);
    }
}
