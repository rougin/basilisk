<?php

namespace App\Controllers;

/**
 * Home Controller
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class HomeController
{
    /**
     * Returns the "Hello, Muggle" page.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        return view('index');
    }
}
