<?php

namespace App;

use Rougin\Slytherin\Http\ServerRequest;

/**
 * @package Basilisk
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class UsingApp extends Testcase
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
        $this->app = new System(__DIR__ . '/../');
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
