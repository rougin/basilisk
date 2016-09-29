<?php

if (! function_exists('session')) {
    /**
     * Returns a value from $_SESSION variable.
     *
     * @param  array|string|null $variable
     * @param  mixed|null        $defaultValue
     * @return mixed|void
     */
    function session($variable = null, $defaultValue = null)
    {
        if ($variable === null) {
            return $_SESSION;
        }

        $multiArray  = new Tebru\MultiArray($_SESSION);
        $returnValue = $defaultValue;

        if (is_string($variable)) {
            if ($multiArray->exists($variable)) {
                return $multiArray->get($variable);
            }

            return $returnValue;
        }

        foreach ($variable as $key => $returnValue) {
            if ($returnValue === null && $multiArray->exists($key)) {
                $multiArray->remove($key);

                unset($_SESSION[$key]);

                continue;
            }

            $_SESSION[$key] = $returnValue;
        }
    }
}
