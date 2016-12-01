<?php

namespace App\Helpers;

/**
 * Redirect Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class RedirectHelperTest extends \App\TestCase
{
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

        if (function_exists('xdebug_get_headers')) {
            $this->assertContains($header, xdebug_get_headers());
        } else {
            $this->assertTrue(true);
        }
    }
}
