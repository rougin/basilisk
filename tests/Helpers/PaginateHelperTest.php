<?php

namespace App\Helpers;

use Rougin\Slytherin\Component\Collector;
use Rougin\Slytherin\IoC\Vanilla\Container;

/**
 * Paginate Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class PaginateHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Loads the helpers.
     *
     * @return void
     */
    public function setUp()
    {
        // Loads the helpers
        $helpers = glob(__DIR__ . '/../../src/Helpers/*.php');
        foreach ($helpers as $helper): require $helper;
        endforeach;

        $list = [ 'App\Components\HttpComponent' ];

        // Loads the components
        $components = Collector::get(new Container, $list);
        $GLOBALS['container'] = $components->getContainer();
    }

    /**
     * Tests the helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $sampleData = [ [ 'name' => 'foo' ], [ 'name' => 'bar' ] ];
        $pagination = paginate($sampleData);

        $renderedView = '<ul class="pagination"><li class="prev disabled"><span>&larr; Previous</span></li><li class="active"><span>1 <span class="sr-only">(current)</span></span></li><li class="next disabled"><span>Next &rarr;</span></li></ul>';

        $this->assertEquals($renderedView, $pagination[1]);
    }
}
