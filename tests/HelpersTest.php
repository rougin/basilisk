<?php

namespace Skeleton;

/**
 * Helpers Test
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class HelpersTest extends TestCase
{
    /**
     * Tests base_path().
     *
     * @return void
     */
    public function testBasePath()
    {
        $file = base_path('src/helpers.php');

        $this->assertTrue(file_exists($file));
    }

    /**
     * Tests config().
     *
     * @return void
     */
    public function testConfig()
    {
        $expected = 'http://localhost:8000';

        $this->assertEquals($expected, config('app.base_url'));
    }

    /**
     * Tests middleware().
     *
     * @return void
     */
    public function testMiddleware()
    {
        $this->assertEmpty(middleware());
    }

    /**
     * Tests redirect().
     *
     * @runInSeparateProcess
     *
     * @return void
     */
    public function testRedirect()
    {
        $response = redirect('/', array('foo' => 'bar'));

        $this->assertTrue($response->hasHeader('Location'));
    }

    /**
     * Tests request().
     *
     * @return void
     */
    public function testRequest()
    {
        $interface = 'Psr\Http\Message\ServerRequestInterface';

        $this->assertInstanceOf($interface, request());
    }

    /**
     * Tests response().
     *
     * @return void
     */
    public function testResponse()
    {
        $interface = 'Psr\Http\Message\ResponseInterface';

        $this->assertInstanceOf($interface, response());
    }

    /**
     * Tests url().
     *
     * @return void
     */
    public function testUrl()
    {
        $expected = config('app.base_url') . 'test';

        $this->assertEquals($expected, url('test'));
    }

    /**
     * Tests validate().
     *
     * @runInSeparateProcess
     *
     * @return void
     */
    public function testValidate()
    {
        if (! class_exists('Valitron\Validator')) {
            $this->markTestSkipped('Valitron is not installed.');
        }

        $result = validate('Skeleton\Validators\UserValidator', array(), false);

        $this->assertCount(0, $result);
    }

    /**
     * Tests view().
     *
     * @runInSeparateProcess
     *
     * @return void
     */
    public function testView()
    {
        $view = view('welcome/index', array('url' => config('app.base_url')));

        $this->assertRegexp('/Hello/', $view);
    }
}
