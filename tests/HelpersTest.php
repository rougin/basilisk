<?php

namespace App;

/**
 * Helpers Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class HelpersTest extends TestCase
{
    /**
     * Tests path().
     *
     * @return void
     */
    public function testPathMethod()
    {
        $file = path('src/helpers.php');

        $this->assertTrue(file_exists($file));
    }
}
