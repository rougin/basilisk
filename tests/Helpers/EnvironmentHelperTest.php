<?php

namespace App\Helpers;

/**
 * Environment Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class EnvironmentHelperTest extends \App\TestCase
{
    /**
     * Tests the helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $expected = 'development';

        $this->assertEquals($expected, env('ENVIRONMENT'));
    }

    /**
     * Tests the helper.
     *
     * @return void
     */
    public function testHelperWithUndefinedVariable()
    {
        $expected = 'foobar';

        $this->assertEquals($expected, env('TEST', $expected));
    }
}
