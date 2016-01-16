<?php

namespace App\Http\Controllers;

/**
 * Greet Controller
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class GreetController extends BaseController
{
    /**
     * Greets the specified name, if any.
     * 
     * @return json
     */
    public function index($name = 'Stranger')
    {
        return 'Hello, ' . $name . '.';
    }
}
