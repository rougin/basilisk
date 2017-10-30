<?php

namespace App\Http\Controllers;

class AuthControllerTest extends \App\TestCase
{
    /**
     * Tests AuthController::login.
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->handle('GET', '/auth/login');

        $stream = (string) $response->getBody();

        $this->assertRegExp('/E-mail Address/i', $stream);
    }

    /**
     * Tests AuthController::login with error.
     *
     * @return void
     */
    public function testLoginWithError()
    {
        $data = [ 'email' => 'hjpotter@hogwarts.co.uk' ];

        $response = $this->handle('POST', '/auth/login', $data);

        $url = $response->getHeader('Location');

        $this->assertEquals($url[0], '/auth/login');
    }

    /**
     * Tests AuthController::login with success.
     *
     * @return void
     */
    public function testLoginWithSuccess()
    {
        $data = [ 'email' => 'hjpotter@hogwarts.co.uk', 'password' => '12345' ];

        $response = $this->handle('POST', '/auth/login', $data);

        $this->assertEquals($response->getHeader('Location')[0], '/');
    }

    /**
     * Tests AuthController::logout.
     *
     * @return void
     */
    public function testLogout()
    {
        $response = $this->handle('GET', '/auth/logout');

        $this->assertEquals($response->getHeader('Location')[0], '/');
    }
}
