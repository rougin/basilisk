<?php

namespace App\Helpers;

/**
 * Redirect Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class RedirectHelperTest extends \PHPUnit_Framework_TestCase
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
     * @runInSeparateProcess
     *
     * @return void
     */
    public function testHelper()
    {
        redirect('/', [], false);

        $header = 'Location: http://localhost:8000/';

        $this->assertContains($header, xdebug_get_headers());
    }
}
