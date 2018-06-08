<?php

namespace App\Validators;

/**
 * Auth Validator
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class AuthValidator extends AbstractValidator
{
    /**
     * Sets the labels in the validator.
     *
     * @return array
     */
    protected function labels()
    {
        $labels = array();

        $labels['email'] = 'Email';

        $labels['password'] = 'Password';

        return $labels;
    }

    /**
     * Sets the rules in the validator.
     *
     * @param  array $data
     * @return void
     */
    protected function rules($data = array())
    {
        $this->validator->rule('required', 'email');

        $this->validator->rule('required', 'password');
    }
}
