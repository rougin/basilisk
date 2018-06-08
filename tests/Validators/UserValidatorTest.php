<?php

namespace App\Validators;

use Valitron\Validator;
use App\AbstractTestCase;

/**
 * User Validator Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class UserValidatorTest extends AbstractTestCase
{
    /**
     * @var \Valitron\Validator
     */
    protected $validator;

    /**
     * Sets up the Valitron instance.
     */
    public function setUp()
    {
        $this->validator = new Validator;
    }

    /**
     * Tests AbstractValidator::errors.
     *
     * @return void
     */
    public function testErrorsMethod()
    {
        $expected = array('name' => array('Name is required'));

        $expected['email'] = array('Email is required');

        $expected['email'][] = 'Email is not a valid email address';

        $validator = new UserValidator($this->validator);

        $validator->validate();

        $result = (array) $validator->errors();

        $this->assertEquals($expected, $result);
    }

    /**
     * Tests AbstractValidator::validate.
     *
     * @return void
     */
    public function testValidateMethod()
    {
        $validator = new UserValidator($this->validator);

        $data = array('name' => 'Harry James Potter');

        $data['email'] = 'hjpotter@hogwarts.co.uk';

        $data['password_confirmation'] = '1234567890';

        $data['password'] = (string) '1234567890';

        $this->assertTrue($validator->validate($data));
    }
}
