<?php

if (! function_exists('carbon')) {
    /**
     * Returns an instance of Carbon.
     *
     * @param  DateTime|null $date
     * @return Carbon\Carbon|null
     */
    function carbon($date)
    {
        if (! $date instanceof DateTime) {
            return null;
        }

        return Carbon\Carbon::instance($date);
    }
}
