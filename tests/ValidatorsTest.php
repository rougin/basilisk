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
     * @var \Valitron\Validator
     */
    protected $validator;

    /**
     * Sets up the validator.
     */
    public function setUp()
    {
        $message = 'The package "vlucas/validation" is not yet installed.';

        class_exists('Valitron\Validator') || $this->markTestSkipped($message);

        $this->validator = new \Valitron\Validator;
    }

    /**
     * Tests AuthValidator::errors.
     *
     * @return void
     */
    public function testErrorsMethod()
    {
        $expected = [ 'email' => [ 'Email is required' ] ];

        $expected['password'] = [ 'Password is required' ];

        $validator = new Validators\AuthValidator($this->validator);

        $validator->validate();

        $this->assertEquals($expected, $validator->errors());
    }

    /**
     * Tests UserValidator::validate.
     *
     * @return void
     */
    public function testValidateMethod()
    {
        $validator = new Validators\UserValidator($this->validator);

        $data = [ 'name' => 'Harry James Potter' ];

        $data['email'] = 'hjpotter@hogwarts.co.uk';

        $data['password'] = '1234567890';

        $data['password_confirmation'] = '1234567890';

        $this->assertTrue($validator->validate($data));
    }
}
