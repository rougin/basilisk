<?php

namespace App\Helpers;

use Dotenv\Dotenv;

/**
 * Environment Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class EnvHelperTest extends \PHPUnit_Framework_TestCase
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
        foreach ($helpers as $helper): require $helper; endforeach;

        (new Dotenv(base()))->load();
    }

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
}
