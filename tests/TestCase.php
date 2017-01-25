<?php

namespace Skeleton;

use Rougin\Slytherin\Component\Collector;

/**
 * Selenium TestCase
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $components;

    /**
     * Loads the helpers.
     *
     * @return void
     */
    public function setUp()
    {
        (new \Dotenv\Dotenv(base_path()))->load();

        // Loads the components
        $this->components = Collector::get(config('app.container'), config('app.components'));

        $GLOBALS['container'] = $this->components->getContainer();
    }
}
