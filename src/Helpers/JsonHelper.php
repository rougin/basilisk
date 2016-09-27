<?php

use JMS\Serializer\SerializerInterface;

if (! function_exists('json')) {
    /**
     * Parses the data to JSON format.
     *
     * @param  mixed $data
     * @return string
     */
    function json($data)
    {
        $serializer = container()->get(SerializerInterface::class);

        return $serializer->serialize($data, 'json');
    }
}
