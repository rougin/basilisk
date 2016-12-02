<?php

namespace App;

use Rougin\Slytherin\Component\Collector;

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

        // Loads the components
        $components = Collector::get(config('app.container'), config('app.components'));

        $GLOBALS['container'] = $components->getContainer();
    }
}