<?php

namespace App\Helpers;

/**
 * Base Path Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BasePathHelperTest extends \App\TestCase
{
    /**
     * Tests the helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $file = base_path('src/Helpers/BasePathHelper.php');

        $this->assertTrue(file_exists($file));
    }
}
