<?php

namespace App\Http\Controllers;

use App\Facades\Emitter;
use App\Facades\Response;
use App\Facades\Serializer;

/**
 * Base Controller
 *
 * @package Valkyrie
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BaseController
{
    /**
     * Returns the data into a specified type.
     * 
     * @param  mixed   $data
     * @param  integer $type
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function toResponse($data, $code = 200)
    {
        $content = [ 'code' => $code, 'data' => $data ];
        $data = Serializer::serialize($content, 'json');

        $response = Response::get()
            ->withStatus($code)
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', config('app.client_url'))
            ->withHeader('Access-Control-Allow-Credentials', 'true');

        $response->getBody()->write($data);
        
        return Emitter::emit($response);
    }
}
