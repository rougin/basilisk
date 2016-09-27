<?php

if ( ! function_exists('validate')) {
	/**
	 * Validates the data from a specified validator.
	 * 
	 * @param  string  $validatorName
	 * @param  mixed   $data
     * @param  boolean $debugMode
	 * @return void|redirect
	 */
    function validate($validatorName, $data, $debugMode = false)
    {
        $validator = new $validatorName;

        if ( ! $validator->validate($data)) {
            $flash = [];

            $flash['validation'] = $validator->getErrors();
            $flash['old'] = $data;

            if ($debugMode) {
                var_dump($flash);
                exit;
            }

            return redirect($_SERVER['HTTP_REFERER'], $flash);
        }
    }
}