<?php

if (! function_exists('json')) {
    /**
     * Parses the data to JSON format.
     *
     * @param  mixed $data
     * @return string
     */
    function json($data)
    {
        $serializer = container()->get('JMS\Serializer\SerializerInterface');

        return $serializer->serialize($data, 'json');
    }
}
