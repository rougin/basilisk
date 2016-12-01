<?php

namespace App\Helpers;

/**
 * Session Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class SessionHelperTest extends \App\TestCase
{
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
