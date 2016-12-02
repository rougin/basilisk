<?php

namespace App\Helpers;

/**
 * View Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ViewHelperTest extends \App\TestCase
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
        $this->assertRegexp('/Hello/', view('welcome/index', [ 'url' => config('app.base_url') ]));
    }
}
