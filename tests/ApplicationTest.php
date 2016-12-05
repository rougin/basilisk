<?php

namespace App;

use Rougin\Slytherin\Component\Collector;

/**
 * Application Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ApplicationTest extends TestCase
{
    /**
     * Tests the application.
     *
     * @return void
     */
    public function testApplication()
    {
        $this->expectOutputRegex('/Hello/');

        (new \Rougin\Slytherin\Application($this->components))->run();
    }
}
