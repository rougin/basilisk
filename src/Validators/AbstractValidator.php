<?php

namespace Skeleton\Validators;

/**
 * Abstract Validator
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
     * Creates a validator instance.
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
     * Validates the data from the based rules.
     *
     * @param  array $data
     * @return boolean
     */
    public function validate(array $data)
    {
        $this->validator->labels($this->labels());

        $this->rules($data);

        $validator = $this->validator->withData($data);

        $validated = $validator->validate();

        $validated || $this->errors = $validator->errors();

        return $validated;
    }
}
