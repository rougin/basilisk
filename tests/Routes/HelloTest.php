<?php

namespace App\Routes;

use App\UsingApp;

/**
 * @package App
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class HelloTest extends UsingApp
{
    /**
     * @return void
     */
    public function test_simple_route()
    {
        $expected = (string) 'Hello, Muggle!';

        $response = $this->handle('GET', '/');

        $actual = $response->getBody()->__toString();

        $exists = strpos($actual, $expected);

        $this->assertTrue($exists !== false);
    }
}
