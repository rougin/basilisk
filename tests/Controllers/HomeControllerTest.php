<?php

namespace App\Controllers;

use App\AbstractTestCase;

/**
 * Home Controller Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class HomeControllerTest extends AbstractTestCase
{
    /**
     * Tests HomeController::index.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = (string) $this->handle()->getBody();

        $this->assertRegExp('/Hello/i', $response);
    }
}
