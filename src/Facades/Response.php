<?php

namespace App\Facades;

use Psr\Http\Message\ResponseInterface;

/**
 * Response Facade
 *
 * @package Valkyrie
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class Response
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected static $response;

    /**
     * Gets the response.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function get()
    {
        return self::$response;
    }

    /**
     * Sets the response.
     * 
     * @param  \Psr\Http\Message\ResponseInterface $response
     * @return void
     */
    public static function set(ResponseInterface $response)
    {
        self::$response = $response;
    }
}
