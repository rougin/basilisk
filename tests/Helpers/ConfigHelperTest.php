<?php

namespace App\Helpers;

/**
 * Config Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ConfigHelperTest extends \App\TestCase
{
    /**
     * Tests the helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $expected = 'http://localhost:8000';

        $this->assertEquals($expected, config('app.base_url'));
    }

    /**
     * Tests the exception from the helper.
     *
     * @return void
     */
    public function testException()
    {
        $this->setExpectedException('InvalidArgumentException');

        config('test');
    }
}
