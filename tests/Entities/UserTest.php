<?php

namespace App\Entities;

use App\AbstractTestCase;

/**
 * User Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class UserTest extends AbstractTestCase
{
    /**
     * Tests User::setPasswordAttribute.
     *
     * @return void
     */
    public function testSetPasswordAttributeMethod()
    {
        list($expected, $model) = array('basilisk', new User);

        $model->password = (string) $expected;

        $verified = password_verify($expected, $model->password);

        $this->assertTrue($verified);
    }
}
