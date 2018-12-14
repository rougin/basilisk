<?php

namespace App\Validators;

use Valitron\Validator;
use App\AbstractTestCase;

/**
 * Authentication Validator Test
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class AuthValidatorTest extends AbstractTestCase
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
        $expected = array('email' => array('Email is required'));

        $expected['password'] = array('Password is required');

        $validator = new AuthValidator($this->validator);

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
        $validator = new AuthValidator($this->validator);

        $data = array('name' => 'Harry James Potter');

        $data['email'] = 'hjpotter@hogwarts.co.uk';

        $data['password'] = (array) '1234567890';

        $this->assertTrue($validator->validate($data));
    }
}
