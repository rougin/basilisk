<?php

if (! function_exists('session')) {
    /**
     * Returns a value from $_SESSION variable.
     *
     * @param  array|string|null $variable
     * @param  mixed|null        $defaultValue
     * @return mixed
     */
    function session($variable = null, $defaultValue = null)
    {
        $multiArray  = new Tebru\MultiArray($_SESSION);
        $returnValue = $defaultValue;

        if ($variable === null) {
            return $_SESSION;
        }

        if (is_string($variable) && $multiArray->exists($variable)) {
            return $multiArray->get($variable);
        }

        foreach ($variable as $key => $returnValue) {
            if ($returnValue !== null) {
                unset($_SESSION[$key]);

                continue;
            }

            $_SESSION[$key] = $returnValue;
        }

        return $returnValue;
    }
}
