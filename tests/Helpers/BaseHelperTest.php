<?php

namespace App\Helpers;

/**
 * Base Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BaseHelperTest extends \App\TestCase
{
    /**
     * Tests the helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $file = base('/src/Helpers/BaseHelper.php');

        $this->assertTrue(file_exists($file));
    }
}
