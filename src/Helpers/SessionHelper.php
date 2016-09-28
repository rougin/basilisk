<?php

if (! function_exists('session')) {
    /**
     * Returns a value from $_SESSION variable.
     *
     * @param  string|null $variable
     * @param  mixed|null  $defaultValue
     * @return mixed
     */
    function session($variable = null, $defaultValue = null, $deleteAfter = false)
    {
        if ($variable === null) {
            return $_SESSION;
        }

        $multiArray = new Tebru\MultiArray($_SESSION);
        $value = $defaultValue;

        if ($multiArray->exists($variable)) {
            $value = $multiArray->get($variable);
        }

        if ($deleteAfter) {
            if ($multiArray->exists($variable)) {
                $multiArray->remove($variable);
            }

            unset($_SESSION[$variable]);
        }

        return $value;
    }
}
