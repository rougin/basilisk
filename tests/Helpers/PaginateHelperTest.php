<?php

namespace App\Helpers;

/**
 * Paginate Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class PaginateHelperTest extends \App\TestCase
{
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
