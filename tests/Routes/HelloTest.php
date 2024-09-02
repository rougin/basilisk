<?php

namespace App\Routes;

use App\System;
use App\Testcase;

/**
 * @package App
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class HelloTest extends Testcase
{
    /**
     * @var \App\System
     */
    protected $app;

    /**
     * @return void
     */
    public function doSetUp()
    {
        $this->app = new System(__DIR__ . '/../../');
    }

    /**
     * @runInSeparateProcess
     *
     * @return void
     */
    public function test_simple_route()
    {
        $this->expectOutputString('Hello, Muggle!');

        $this->handle('GET', '/');
    }

    /**
     * @param string $method
     * @param string $uri
     *
     * @return void
     */
    protected function handle($method, $uri)
    {
        $_SERVER['REQUEST_METHOD'] = $method;
        $_SERVER['REQUEST_URI'] = $uri;
        $_SERVER['SERVER_NAME'] = 'localhost';
        $_SERVER['SERVER_PORT'] = '8000';

        $this->app->make()->run();
    }
}
