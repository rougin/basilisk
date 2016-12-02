<?php

namespace App\Helpers;

/**
 * Validate Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ValidateHelperTest extends \App\TestCase
{
    /**
     * Tests the helper.
     *
     * @runInSeparateProcess
     *
     * @return void
     */
    public function testHelper()
    {
        $this->assertCount(3, validate('App\Validators\UserValidator', [], false));
    }
}
