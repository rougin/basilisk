<?php

namespace App\Validators;

/**
 * Validator Interface
 * 
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
interface ValidatorInterface
{
    /**
     * Checks if the data is validated.
     * 
     * @param  array  $data
     * @return boolean
     */
    public function validate(array $data);

    /**
     * Returns a listing of errors, if any.
     * 
     * @return array
     */
    public function getErrors();
}
