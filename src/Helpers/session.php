<?php

if ( ! function_exists('session')) {
    /**
     * Returns a value from $_SESSION variable.
     * 
     * @param  string|null $variable
     * @param  mixed|null  $defaultValue
     * @return mixed
     */
    function session($variable = null, $defaultValue = null, $deleteAfter = false)
    {
        if ( ! $variable) {
            return $_SESSION;
        }

        $value = (isset($_SESSION[$variable])) ? $_SESSION[$variable] : $defaultValue;

        if ($deleteAfter) {
            unset($_SESSION[$variable]);
        }

        return $value;
    }
}
