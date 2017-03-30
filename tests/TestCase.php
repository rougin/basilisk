<?php

namespace Skeleton;

/**
 * Selenium TestCase
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Rougin\Slytherin\Application\Application
     */
    protected $application;

    /**
     * Loads the helpers.
     *
     * @return void
     */
    public function setUp()
    {
        $dotenv = new \Dotenv\Dotenv(base_path());

        $dotenv->load();

        $server = array();

        $server['REQUEST_METHOD'] = 'GET';
        $server['REQUEST_URI']    = '/';
        $server['SERVER_NAME']    = 'localhost';
        $server['SERVER_PORT']    = '8000';

        $container = new \Rougin\Slytherin\Container\Container;

        $config = new \Rougin\Slytherin\Configuration(base_path('app/config'));

        $config->set('app.http.server', $server);

        $application = new \Rougin\Slytherin\Application($container);

        $application->integrate($config->get('app.integrations'), $config);

        $this->application = $application;
    }
}
