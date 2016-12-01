<?php

namespace App;

/**
 * Selenium TestCase
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Loads the helpers.
     *
     * @return void
     */
    public function setUp()
    {
        // Loads the helpers
        $helpers = glob(__DIR__ . '/../src/Helpers/*.php');

        foreach ($helpers as $helper) {
            require $helper;
        }

        (new \Dotenv\Dotenv(base()))->load();

        $list = [ 'App\Components\HttpComponent' ];

        // Loads the components
        $container  = new \Rougin\Slytherin\IoC\Vanilla\Container;
        $components = \Rougin\Slytherin\Component\Collector::get($container, $list);

        $GLOBALS['container'] = $components->getContainer();
    }
}
