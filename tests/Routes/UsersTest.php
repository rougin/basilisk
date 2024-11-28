<?php

namespace App\Routes;

use App\UsingApp;

/**
 * @package Basilisk
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class UsersTest extends UsingApp
{
    /**
     * @return void
     */
    public function test_route_with_depot()
    {
        $expected = $this->items();

        $response = $this->handle('GET', '/users');

        $actual = $response->getBody()->__toString();
        $actual = json_decode($actual, true);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array<string, mixed>[]
     */
    protected function items()
    {
        $items = array();

        $row = array('id' => 1);
        $row['name'] = 'Harry James Potter';
        $row['email'] = 'hjpotter@hogwarts.co.uk';
        $items[] = $row;

        $row = array('id' => 2);
        $row['name'] = 'Hermione Jane Granger';
        $row['email'] = 'hjgranger@hogwarts.co.uk';
        $items[] = $row;

        $row = array('id' => 3);
        $row['name'] = 'Ronald Bilius Weasley';
        $row['email'] = 'rbweasley@hogwarts.co.uk';
        $items[] = $row;

        return $items;
    }
}
