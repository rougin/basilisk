<?php

namespace App\Helpers;

use Rougin\Slytherin\Component\Collector;

/**
 * Application Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests the application.
     *
     * @return void
     */
    public function testApplication()
    {
        $this->expectOutputRegex('/Hello/');

        // Loads the helpers
        $helpers = glob(__DIR__ . '/../src/Helpers/*.php');

        foreach ($helpers as $helper) {
            require $helper;
        }

        (new \Dotenv\Dotenv(base()))->load();

        // Loads the components
        $components = Collector::get(config('app.container'), config('app.components'));

        $GLOBALS['container'] = $components->getContainer();

        (new \Rougin\Slytherin\Application($components))->run();
    }
}
