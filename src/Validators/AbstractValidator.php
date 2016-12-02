<?php

namespace App\Validators;

/**
 * Base Validator
 *
 * A base class for a validator.
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
abstract class AbstractValidator
{
    /**
     * @var array
     */
    protected $errors = [];

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
    abstract protected function setLabels(Validator &$validator);

    /**
     * Sets the rules in the validator.
     *
     * @param  \Valitron\Validator $validator
     * @param  array               $data
     * @return void
     */
    abstract protected function setRules(Validator &$validator, $data = []);

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

        if (! $isValidated) {
            $this->errors = is_array($validator->errors()) ? $validator->errors() : [];
        }

        return $isValidated;
    }
}
