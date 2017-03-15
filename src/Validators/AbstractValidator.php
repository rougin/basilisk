<?php

namespace Skeleton\Validators;

/**
 * Abstract Validator
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
    public $errors = array();

    /**
     * @var \Valitron\Validator
     */
    protected $validator;

    public function __construct()
    {
        $this->validator = new \Valitron\Validator;
    }

    /**
     * Sets the labels in the validator.
     *
     * @return void
     */
    abstract protected function labels();

    /**
     * Sets the rules in the validator.
     *
     * @param  array $data
     * @return void
     */
    abstract protected function rules($data = array());

    /**
     * Validates the data from the registration page.
     *
     * @param  array  $data
     * @return boolean
     */
    public function validate(array $data)
    {
        $this->validator->labels($this->labels());

        $this->rules($data);

        $validator = $this->validator->withData($data);
        $validated = $validator->validate();

        if (! $validated && is_array($validator->errors())) {
            $this->errors = $validator->errors();
        }

        return $validated;
    }
}
