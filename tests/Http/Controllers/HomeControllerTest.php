<?php

namespace App\Http\Controllers;

class HomeControllerTest extends \App\TestCase
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
