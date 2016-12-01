<?php

namespace App\Helpers;

/**
 * Container Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ContainerHelperTest extends \App\TestCase
{
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
