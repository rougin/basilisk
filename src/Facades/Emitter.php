<?php

namespace App\Facades;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\EmitterInterface;

/**
 * Emitter Facade
 *
 * @package Valkyrie
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class Emitter
{
    /**
     * @var \Zend\Diactoros\Response\EmitterInterface
     */
    protected static $emitter;

    /**
     * Emits a response for a PHP SAPI environment.
     *
     * Emits the status line and headers via the header() function, and the
     * body content via the output buffer.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param null|int $maxBufferLevel Maximum output buffering level to unwrap.
     */
    public static function emit(ResponseInterface $response, $maxBufferLevel = null)
    {
        return self::$emitter->emit($response, $maxBufferLevel);
    }

    /**
     * Sets the emitter.
     * 
     * @param  \Zend\Diactoros\Response\EmitterInterface $emitter
     * @return void
     */
    public static function set(EmitterInterface $emitter)
    {
        self::$emitter = $emitter;
    }
}
