<?php

namespace App;

/**
 * Application Helper Test
 *
 * @runTestsInSeparateProcesses
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class AppTest extends TestCase
{
    /**
     * Tests the application.
     *
     * @return void
     */
    public function testApp()
    {
        $this->expectOutputRegex('/Hello/');

        $this->app->run();
    }

    /**
     * Tests GET AuthController::login.
     *
     * @return void
     */
    public function testGetAuthLogin()
    {
        $request = $this->request('GET', '/auth/login');

        $response = $this->app->handle($request);

        $stream = (string) $response->getBody();

        $this->assertRegExp('/E-Mail Address/i', $stream);
    }
}
