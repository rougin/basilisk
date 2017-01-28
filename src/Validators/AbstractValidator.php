<?php

namespace Skeleton\Validators;

/**
 * Base Validator
 *
 * A base class for a validator.
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
abstract class AbstractValidator
{
    /**
     * @var array
     */
    protected $errors = array();

    /**
     * Returns a listing of error, if any.
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets the labels in the validator.
     *
     * @param  \Valitron\Validator $validator
     * @return void
     */
    abstract protected function setLabels(\Valitron\Validator &$validator);

    /**
     * Sets the rules in the validator.
     *
     * @param  \Valitron\Validator $validator
     * @param  array               $data
     * @return void
     */
    abstract protected function setRules(\Valitron\Validator &$validator, $data = array());

    /**
     * Validates the data from the registration page.
     *
     * @param  array  $data
     * @return boolean
     */
    public function validate(array $data)
    {
        $validator = new \Valitron\Validator($data);

        $this->setLabels($validator);
        $this->setRules($validator, $data);

        $isValidated = $validator->validate();

        if (! $isValidated && is_array($validator->errors())) {
            $this->errors = $validator->errors();
        }

        return $isValidated;
    }
}
