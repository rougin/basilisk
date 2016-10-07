<?php

namespace App\Helpers;

use Rougin\Slytherin\Component\Collector;
use Rougin\Slytherin\IoC\Vanilla\Container;

/**
 * Container Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ContainerHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Loads the helpers and the components.
     *
     * @return void
     */
    public function setUp()
    {
        // Loads the helpers
        $helpers = glob(__DIR__ . '/../../src/Helpers/*.php');
        foreach ($helpers as $helper): require $helper;
        endforeach;

        $list = [ 'App\Components\HttpComponent' ];

        // Loads the components
        $components = Collector::get(new Container, $list);
        $GLOBALS['container'] = $components->getContainer();
    }

    /**
     * Tests the helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $className = 'Psr\Http\Message\ServerRequestInterface';
        $object    = container()->get($className);

        $this->assertInstanceOf($className, $object);
    }
}
