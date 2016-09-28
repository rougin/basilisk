<?php

namespace App\Components;

use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;
use Interop\Container\ContainerInterface;

use Rougin\Slytherin\Component\AbstractComponent;
use Rougin\Slytherin\Http\BaseUriGuesser;

/**
 * HTTP Component
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class HttpComponent extends AbstractComponent
{
    /**
     * Type of the component:
     * dispatcher, debugger, http, middleware
     *
     * @var string
     */
    protected $type = 'http';

    /**
     * @var \Psr\Http\Message\ServerRequestInterface
     */
    protected $request;

    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $response;

    /**
     * Returns an instance from the named class.
     *
     * @return mixed
     */
    public function get()
    {
        $request  = ServerRequestFactory::fromGlobals();
        $response = new Response;

        // Guess the protocol and the root URI
        if ($request->getUri() && ! config('app.base_url')) {
            $request = BaseUriGuesser::guess($request);
        }

        $this->request  = $request;
        $this->response = $response;

        return [ $this->request, $this->response ];
    }

    /**
     * Sets the component.
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @return void
     */
    public function set(ContainerInterface &$container)
    {
        $container->instances['Psr\Http\Message\ServerRequestInterface'] = $this->request;
        $container->instances['Psr\Http\Message\ResponseInterface']      = $this->response;
    }
}
