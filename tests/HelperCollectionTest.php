<?php

namespace App;

/**
 * Helper Collection Test
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class HelperCollectionTest extends AbstractTestCase
{
    /**
     * Tests config().
     *
     * @return void
     */
    public function testConfigMethod()
    {
        $expected = 'http://localhost:8000';

        $this->assertEquals($expected, config('app.base_url'));
    }

    /**
     * Tests path().
     *
     * @return void
     */
    public function testPathMethod()
    {
        $file = path('src/HelperCollection.php');

        $this->assertTrue(file_exists($file));
    }

    /**
     * Tests redirect().
     *
     * @return void
     */
    public function testRedirectMethod()
    {
        $response = redirect('/');

        $this->assertTrue($response->hasHeader('Location'));
    }

    /**
     * Tests request().
     *
     * @return void
     */
    public function testRequestMethod()
    {
        $interface = 'Psr\Http\Message\ServerRequestInterface';

        $this->assertInstanceOf($interface, request());
    }

    /**
     * Tests response().
     *
     * @return void
     */
    public function testResponseMethod()
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
        $expected = config('app.base_url') . '/test';
      
        $this->assertEquals($expected, url('test'));
    }

    /**
     * Tests view().
     *
     * @return void
     */
    public function testViewMethod()
    {
        $this->assertRegexp('/Hello/', view('index'));
    }
}
