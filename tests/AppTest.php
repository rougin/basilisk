<?php

namespace App;

/**
 * Application Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class AppTest extends TestCase
{
    /**
     * Tests the application.
     *
     * @runInSeparateProcess
     *
     * @return void
     */
    public function testApp()
    {
        $this->expectOutputRegex('/Hello/');

        $this->application->run();
    }
}
