<?php

namespace App;

/**
 * Validators Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ValidatorsTest extends TestCase
{
    /**
     * Sets up the validator.
     */
    public function setUp()
    {
        $message = 'The package "vlucas/validation" is not yet installed.';

        class_exists('Valitron\Validator') || $this->markTestSkipped($message);
    }

    /**
     * Tests UserValidator::validate.
     *
     * @return void
     */
    public function testValidateMethod()
    {
        $validator = new Validators\UserValidator;

        $data = array('name' => 'Harry James Potter');

        $data['email'] = 'hjpotter@hogwarts.co.uk';
        $data['password'] = '1234567890';
        $data['password_confirmation'] = '1234567890';

        $this->assertTrue($validator->validate($data));
    }
}
