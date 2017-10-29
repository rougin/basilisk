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
        return $this->validator->errors();
    }

    /**
     * Validates the data from the based rules.
     *
     * @param  array $data
     * @return boolean
     */
    public function validate($data = [])
    {
        $this->validator->labels($this->labels());

        $this->rules($data);

        $this->validator = $this->validator->withData($data);

        return $this->validator->validate();
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
    abstract protected function rules($data = []);
}
