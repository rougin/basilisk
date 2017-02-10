<?php

namespace Skeleton\Components;

/**
 * HTTP Component
 *
 * Returns the HTTP request and response in order to be used in the project.
 *
 * @package Skeleton
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class HttpComponent extends \Rougin\Slytherin\Component\AbstractComponent
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
     * @var \Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    protected $response;

    /**
     * Returns an instance from the named class.
     *
     * @return mixed
     */
    public function get()
    {
        list($this->request, $this->response) = $this->prepareSlytherinHttp();

        if (class_exists('Zend\Diactoros\ServerRequestFactory')) {
            $this->request  = \Zend\Diactoros\ServerRequestFactory::fromGlobals();
            $this->response = new \Zend\Diactoros\Response;
        }

        return array($this->request, $this->response);
    }

    /**
     * Sets the component.
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @return void
     */
    public function set(\Interop\Container\ContainerInterface &$container)
    {
        if ($container instanceof \Rougin\Slytherin\IoC\Vanilla\Container) {
            $container->add('Psr\Http\Message\ServerRequestInterface', $this->request);
            $container->add('Psr\Http\Message\ResponseInterface', $this->response);
        }
    }

    /**
     * Prepares the HTTP component based from Slytherin.
     *
     * @return array
     */
    protected function prepareSlytherinHttp()
    {
        $request  = new \Rougin\Slytherin\Http\ServerRequest($_SERVER, $_COOKIE, $_GET, $_FILES, $_POST);
        $response = new \Rougin\Slytherin\Http\Response(http_response_code());

        $original = headers_list();
        $modified = array();

        if (function_exists('xdebug_get_headers')) {
            $original = xdebug_get_headers();
        }

        foreach ($original as $header) {
            list($key, $value) = explode(': ', $header);

            $request = $request->withHeader($key, $value);
        }

        return array($request, $response);
    }
}
