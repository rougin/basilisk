<?php

namespace App;

use Rougin\Slytherin\Application;

/**
 * Selenium Test Case
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Rougin\Slytherin\Application\Application
     */
    protected $app;

    /**
     * Loads the helpers.
     *
     * @return void
     */
    public function setUp()
    {
        list($config, $container) = require path('app/bootstrap.php');

        $config->set('database.default', 'sqlite');

        $config->set('app.http.server.REQUEST_METHOD', 'GET');
        $config->set('app.http.server.REQUEST_URI', '/');
        $config->set('app.http.server.SERVER_NAME', 'localhost');
        $config->set('app.http.server.SERVER_PORT', '8000');

        $app = new Application($container);

        $integrations = array();

        // Slytherin Integrations
        $integrations[] = 'Rougin\Slytherin\Debug\ErrorHandlerIntegration';
        $integrations[] = 'Rougin\Slytherin\Http\HttpIntegration';
        $integrations[] = 'Rougin\Slytherin\Integration\ConfigurationIntegration';
        $integrations[] = 'Rougin\Slytherin\Middleware\MiddlewareIntegration';
        $integrations[] = 'Rougin\Slytherin\Routing\RoutingIntegration';
        $integrations[] = 'Rougin\Slytherin\Template\RendererIntegration';

        // Application Integrations
        $integrations[] = 'App\Integrations\AppIntegration';
        $integrations[] = 'App\Integrations\AuthIntegration';

        // Weasley Integrations
        $integrations[] = 'Rougin\Weasley\Integrations\Illuminate\DatabaseIntegration';
        $integrations[] = 'Rougin\Weasley\Integrations\Illuminate\ViewIntegration';

        $this->app = $app->integrate($integrations, $config);
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
