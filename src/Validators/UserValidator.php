<?php

namespace App\Validators;

use Valitron\Validator;

/**
 * User Validator
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class UserValidator extends BaseValidator
{
    /**
     * Sets the labels in the validator.
     * 
     * @param  \Valitron\Validator $validator
     * @return void
     */
    protected function setLabels(Validator &$validator)
    {
        $validator->labels([ 'name' => 'Name', 'age' => 'Last name', 'gender' => 'Gender' ]);
    }

    /**
     * Sets the rules in the validator.
     * 
     * @param  \Valitron\Validator $validator
     * @param  array $data
     * @return void
     */
    protected function setRules(Validator &$validator, $data = [])
    {
        $validator->rule('required', 'name');
        $validator->rule('required', 'age');
        $validator->rule('required', 'gender');
    }
}
