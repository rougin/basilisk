<?php

namespace App\Validators;

use Valitron\Validator;

/**
 * Base Validator
 *
 * A base class for a validator.
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BaseValidator implements ValidatorInterface
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
        $validator = new Validator($data);

        $this->setLabels($validator);
        $this->setRules($validator, $data);

        if (! $validator->validate()) {
            $this->errors = $validator->errors();

            return false;
        }

        return true;
    }
}
