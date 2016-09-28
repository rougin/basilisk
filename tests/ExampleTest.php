<?php

namespace Test;

class ExampleTest extends \PHPUnit_Extensions_Selenium2TestCase
{
    /**
     * Sets up Selenium configuration.
     *
     * @return void
     */
    public function setUp()
    {
        $this->setHost('127.0.0.1');
        $this->setPort(4444);
        $this->setBrowserUrl('http://localhost:8000');
        $this->setBrowser('chrome');
    }

    /**
     * Destroys instance after using.
     *
     * @return void
     */
    public function tearDown()
    {
        $this->stop();
    }

    /**
     * Tests if the welcome message is displayed.
     *
     * @return void
     */
    public function testWelcomeMessage()
    {
        $this->url('http://localhost:8000');

        $content = $this->byTag('div')->text();

        $this->assertEquals('Hello, Muggle.', $content);
        $this->assertEquals('Slytherin', $this->title());
    }
}
