<?php

namespace App\Http\Controllers;

/**
 * Welcome Controller
 *
 * @package App
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
        $url = url();

        return view('welcome/index', compact('url'));
    }

    /**
     * Returns the name from the URL.
     *
     * @param  string $name
     * @return view
     */
    public function hello($name)
    {
        return view('welcome/hello', compact('name'));
    }
}
