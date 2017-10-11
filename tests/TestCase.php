<?php

namespace App;

use Rougin\Slytherin\Integration\Configuration;

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

        $app = new \Rougin\Slytherin\Application($container);

        $config->set('app.http.server.REQUEST_METHOD', 'GET');
        $config->set('app.http.server.REQUEST_URI', '/');
        $config->set('app.http.server.SERVER_NAME', 'localhost');
        $config->set('app.http.server.SERVER_PORT', '8000');

        $integrations = $config->get('app.integrations');

        $this->app = $app->integrate($integrations, $config);
    }
}
