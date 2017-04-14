<?php

namespace Skeleton\Validators;

/**
 * Abstract Validator
 *
 * An abstract class for a validator.
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

    /**
     * @param \Valitron\Validator $validator
     */
    public function __construct(\Valitron\Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Sets the labels in the validator.
     *
     * @return array
     */
    abstract protected function labels();

    /**
     * Sets the rules in the validator.
     *
     * @param  array $data
     * @return void
     */
    abstract protected function rules(array $data = array());

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
