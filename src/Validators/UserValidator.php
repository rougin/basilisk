<?php

namespace App\Validators;

/**
 * User Validator
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class UserValidator extends AbstractValidator
{
    /**
     * Sets the labels in the validator.
     *
     * @return array
     */
    protected function labels()
    {
        $labels = array();

        $labels['name'] = 'Name';
        $labels['email'] = 'Email';
        $labels['password'] = 'Password';
        $labels['password_confirmation'] = 'Password Confirmation';

        return $labels;
    }

    /**
     * Sets the rules in the validator.
     *
     * @param  array $data
     * @return void
     */
    protected function rules(array $data = array())
    {
        $this->validator->rule('required', 'name');
        $this->validator->rule('required', 'email');
        $this->validator->rule('email', 'email');

        if (isset($data['password']) && ! empty($data['password'])) {
            $this->validator->rule('lengthMin', 'password', 8)->message('{field} must be at least 8 characters');
            $this->validator->rule('required', 'password');
            $this->validator->rule('equals', 'password', 'password_confirmation');
        }
    }
}
