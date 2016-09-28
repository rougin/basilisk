<?php

if (! function_exists('session')) {
    /**
     * Returns a value from $_SESSION variable.
     *
     * @param  array|string|null $variable
     * @param  mixed|null        $defaultValue
     * @return mixed
     */
    function session($variable = null, $defaultValue = null, $deleteAfter = false)
    {
        if ($variable === null) {
            return $_SESSION;
        }

        $multiArray  = new Tebru\MultiArray($_SESSION);
        $returnValue = $defaultValue;

        if (is_string($variable) && $multiArray->exists($variable)) {
            $returnValue = $multiArray->get($variable);
        }

        if ($deleteAfter): $variable = [ $variable => null ]; endif;

        if (is_array($variable)) {
            foreach ($variable as $key => $returnValue) {
                if ($returnValue === null) {
                    if ($multiArray->exists($key)) {
                        $multiArray->remove($key);
                    }

                    unset($_SESSION[$key]);

                    continue;
                }

                $_SESSION[$key] = $returnValue;
            }
        }

        return $returnValue;
    }
}
