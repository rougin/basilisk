<?php

namespace App\Helpers;

/**
 * Config Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ConfigHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Loads the helpers.
     *
     * @return void
     */
    public function setUp()
    {
        // Loads the helpers
        $helpers = glob(__DIR__ . '/../../src/Helpers/*.php');
        foreach ($helpers as $helper): require $helper;
        endforeach;
    }

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
}
