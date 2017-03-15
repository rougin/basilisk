<?php

namespace Skeleton\Http\Controllers;

/**
 * Welcome Controller
 *
 * A simple "Hello world" class.
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class WelcomeController extends BaseController
{
    /**
     * Returns the view page.
     *
     * @return view
     */
    public function index()
    {
        $data = array('url' => config('app.base_url'));

        return view('welcome/index', $data);
    }
}
