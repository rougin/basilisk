<?php

namespace Skeleton\Validators;

use Rougin\Weasley\Validators\AbstractValidator;

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
     * @return array
     */
    protected function labels()
    {
        $labels = array();

        // $labels['column'] = 'value';

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
        // $this->validator->rule('rules', 'column');
    }
}
