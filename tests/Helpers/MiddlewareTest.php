<?php

namespace App\Helpers;

/**
 * Middleware Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class MiddlewareTest extends \App\TestCase
{
    /**
     * Tests the helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $expected = [ 'App\Http\Middlewares\LastMiddleware' ];

        $this->assertEquals($expected, middleware());
    }
}
