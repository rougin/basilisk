<?php

namespace Skeleton;

/**
 * Application Helper Test
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ApplicationTest extends TestCase
{
    /**
     * Tests the application.
     *
     * @runInSeparateProcess
     *
     * @return void
     */
    public function testApplication()
    {
        $this->expectOutputRegex('/Hello/');

        $this->application->run();
    }
}
