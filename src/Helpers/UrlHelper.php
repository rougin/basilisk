<?php
if ( ! function_exists('url')) {
    /**
     * Returns the base URL of the application.
     * 
     * @param  string $link
     * @return string
     */
    function url($link = null)
    {
        return config('app.base_url') . $link;
    }
}
