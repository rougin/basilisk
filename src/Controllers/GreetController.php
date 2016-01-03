<?php

namespace App\Controllers;

use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\EmitterInterface;

/**
 * Greet Controller
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class GreetController extends BaseController
{
    /**
     * @param \Zend\Diactoros\Response\EmitterInterface $emitter
     * @param \Psr\Http\Message\ResponseInterface       $response
     * @param \JMS\Serializer\SerializerInterface       $serializer
     */
    public function __construct(
        EmitterInterface $emitter,
        ResponseInterface $response,
        SerializerInterface $serializer
    ) {
        $this->emitter = $emitter;
        $this->response = $response;
        $this->serializer = $serializer;
    }

    /**
     * Greets the specified name, if any.
     * 
     * @return json
     */
    public function index($name = 'Stranger')
    {
        return 'Hello, ' . $name . '.';
    }
}
