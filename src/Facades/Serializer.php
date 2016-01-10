<?php

namespace App\Facades;

use JMS\Serializer\SerializerInterface;

/**
 * Serializer Facade
 *
 * @package Valkyrie
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class Serializer
{
    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    private static $serializer;

    /**
     * Serializes the specified data from the given format.
     * 
     * @param  mixed  $data
     * @param  string $format
     * @return mixed
     */
    public static function serialize($data, $format)
    {
        return self::$serializer->serialize($data, $format);
    }

    /**
     * Sets the entity manager.
     * 
     * @param  \JMS\Serializer\SerializerInterface $serializer
     * @return void
     */
    public static function set(SerializerInterface $serializer)
    {
        self::$serializer = $serializer;
    }
}
