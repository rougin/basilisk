<?php

if (! function_exists('validate')) {
    /**
     * Validates the data from a specified validator.
     *
     * @param  string  $validatorName
     * @param  mixed   $data
     * @param  boolean $redirect
     * @return void|redirect
     */
    function validate($validatorName, $data, $redirect = true)
    {
        $server = request()->getServerParams();

        $validator = new $validatorName;

        if (! $validator->validate($data)) {
            $flash = [];

            $flash['validation'] = $validator->getErrors();
            $flash['old'] = $data;
        }

        return $redirect ? redirect($server['HTTP_REFERER'], $flash) : $validator->getErrors();
    }
}
