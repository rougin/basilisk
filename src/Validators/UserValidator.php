<?php

namespace Skeleton\Validators;

/**
 * User Validator
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class UserValidator extends AbstractValidator
{
    /**
     * Sets the labels in the validator.
     *
     * @return void
     */
    protected function labels()
    {
        $labels = array();

        $labels['age']    = 'Age';
        $labels['gender'] = 'Gender';
        $labels['name']   = 'Name';

        return $labels;
    }

    /**
     * Sets the rules in the validator.
     *
     * @param  array $data
     * @return void
     */
    protected function rules($data = [])
    {
        $this->validator->rule('required', 'name');
        $this->validator->rule('required', 'age');
        $this->validator->rule('required', 'gender');
    }
}
