<?php

namespace App\Routes;

use App\System;
use App\Testcase;
use Rougin\Slytherin\Http\ServerRequest;

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
     * @return void
     */
    public function test_simple_route()
    {
        $expected = (string) 'Hello, Muggle!';

        $response = $this->handle('GET', '/');

        $actual = $response->getBody()->__toString();

        $exists = strpos($actual, $expected) !== false;

        $this->assertTrue($exists);
    }

    /**
     * @param string $method
     * @param string $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function handle($method, $uri)
    {
        $_SERVER['REQUEST_METHOD'] = $method;
        $_SERVER['REQUEST_URI'] = $uri;
        $_SERVER['SERVER_NAME'] = 'localhost';
        $_SERVER['SERVER_PORT'] = '8000';

        $request = new ServerRequest($_SERVER);

        $app = $this->app->make();

        return $app->handle($request);
    }
}
