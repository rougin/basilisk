<?php

namespace App;

use Rougin\Slytherin\Application;

/**
 * Test Case
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
abstract class AbstractTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Rougin\Slytherin\Application\Application
     */
    protected $app;

    /**
     * Loads the helpers.
     *
     * @runInSeparateProcess
     * @return void
     */
    public function setUp()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['REQUEST_URI'] = '/';
        $_SERVER['SERVER_NAME'] = 'localhost';
        $_SERVER['SERVER_PORT'] = '8000';

        $bootstrap = '/../src/BasiliskBootstrap.php';

        $root = str_replace('tests', '', __DIR__);

        $this->app = BasiliskBootstrap::boot($root);
    }

    /**
     * Creates a response based on given HTTP method and URI.
     *
     * @param  string $method
     * @param  string $uri
     * @param  array  $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function handle($method = 'GET', $uri = '/', $data = array())
    {
        $server = [ 'REQUEST_METHOD' => $method, 'REQUEST_URI' => $uri ];

        $server['SERVER_NAME'] = 'localhost';
        $server['SERVER_PORT'] = '8000';

        $request = new \Rougin\Slytherin\Http\ServerRequest($server);

        switch ($method) {
            case 'GET':
                $request = $request->withQueryParams($data);

                break;
            default:
                $request = $request->withParsedBody($data);

                break;
        }

        $interface = 'Psr\Http\Message\ServerRequestInterface';

        Application::container()->set($interface, $request);

        return $this->app->handle($request);
    }
}
