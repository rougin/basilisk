<?php

namespace App\Http\Controllers;

/**
 * Home Controller
 *
 * Displays a simple "Hello, Muggle" text.
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class HomeController
{
    /**
     * Returns the welcome page.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index()
    {
        return view('index');
    }
}
