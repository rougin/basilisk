<?php

namespace App\Helpers;

/**
 * Base Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BaseHelperTest extends \PHPUnit_Framework_TestCase
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
        foreach ($helpers as $helper): require $helper; endforeach;
    }

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
