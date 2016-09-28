<?php

if (! function_exists('validate')) {
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
        $server = request()->getServerParams();

        $validator = new $validatorName;

        if (! $validator->validate($data)) {
            $flash = [];

            $flash['validation'] = $validator->getErrors();
            $flash['old'] = $data;

            if ($debugMode) {
                echo '<pre>';
                print_r($flash);
                echo '</pre>';

                return;
            }

            return redirect($server['HTTP_REFERER'], $flash);
        }
    }
}
