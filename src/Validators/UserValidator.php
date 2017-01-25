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
     * @param  \Valitron\Validator $validator
     * @return void
     */
    protected function setLabels(\Valitron\Validator &$validator)
    {
        $validator->labels([ 'name' => 'Name', 'age' => 'Last name', 'gender' => 'Gender' ]);
    }

    /**
     * Sets the rules in the validator.
     *
     * @param  \Valitron\Validator $validator
     * @param  array               $data
     * @return void
     */
    protected function setRules(\Valitron\Validator &$validator, $data = [])
    {
        $validator->rule('required', 'name');
        $validator->rule('required', 'age');
        $validator->rule('required', 'gender');
    }
}
