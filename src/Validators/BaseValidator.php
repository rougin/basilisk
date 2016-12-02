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
class BaseValidator
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
