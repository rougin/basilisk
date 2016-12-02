<?php

namespace App\Helpers;

/**
 * Repository Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class RepositoryHelperTest extends \App\TestCase
{
    /**
     * Tests the helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $expected = 'App\Repositories\UserRepository';

        $this->assertInstanceOf($expected, repository($expected));
    }
}
