<?php

namespace App\Controllers;

/**
 * Base Controller
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BaseController
{
    /**
     * @var \Zend\Diactoros\Response\SapiEmitter
     */
    protected $emitter;

    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $response;

    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    protected $serializer;

    /**
     * Returns the data into a specified type.
     * 
     * @param  mixed  $data
     * @param  string $type
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function toResponse($data, $type = 'json')
    {
        $data = $this->serializer->serialize($data, $type);

        $response = $this->response
            ->withStatus(200)
            ->withHeader('Content-Type', 'application/' . $type);

        $response->getBody()->write($data);
        
        return $this->emitter->emit($response);
    }
}
