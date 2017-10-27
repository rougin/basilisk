<?php

namespace App\Validators;

/**
 * Abstract Validator
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
abstract class AbstractValidator
{
    /**
     * @var array
     */
    protected $errors = array();

    /**
     * @var \Valitron\Validator
     */
    protected $validator;

    /**
     * Creates a validator instance.
     *
     * @param $validator \Valitron\Validator
     */
    public function __construct(\Valitron\Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Returns a listing of errors after validation (if any).
     *
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }

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

        $this->errors = $validator->errors();

        return $validated;
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
}
