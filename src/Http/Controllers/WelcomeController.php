<?php

namespace Skeleton\Http\Controllers;

/**
 * Welcome Controller
 *
 * Displays a simple "Hello world" class.
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class WelcomeController extends BaseController
{
    /**
     * Returns the welcome page.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        $data = array('url' => config('app.base_url'));

        return view('welcome/index', $data);
    }
}
