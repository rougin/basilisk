<?php

namespace App\Helpers;

/**
 * Session Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class SessionHelperTest extends \PHPUnit_Framework_TestCase
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
        foreach ($helpers as $helper): require $helper;
        endforeach;
    }

    /**
     * Tests the helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $expected = 'foobar';

        $_SESSION['foo'] = [ 'bar' => $expected ];

        $this->assertEquals($expected, session('foo.bar'));
    }
}
