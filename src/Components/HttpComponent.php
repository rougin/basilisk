<?php

namespace Skeleton\Components;

/**
 * HTTP Component
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
        list($request, $response) = $this->prepareSlytherinHttp();

        if (class_exists('Zend\Diactoros\ServerRequestFactory')) {
            $request  = \Zend\Diactoros\ServerRequestFactory::fromGlobals();
            $response = new \Zend\Diactoros\Response;
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
    public function set(\Interop\Container\ContainerInterface &$container)
    {
        if ($container instanceof \Rougin\Slytherin\IoC\Vanilla\Container) {
            $container->add('Psr\Http\Message\ServerRequestInterface', $this->request);
            $container->add('Psr\Http\Message\ResponseInterface', $this->response);
        }
    }

    /**
     * Prepares the URI instance to be used.
     *
     * @param  array  $server
     * @param  string $requestUri
     * @return \Psr\Http\Message\UriInterface
     */
    protected function prepareUri(array $server, $requestUri)
    {
        $protocol = (! empty($server['HTTPS']) && $server['HTTPS'] != 'off') ? 'https' : 'http';
        $httpHost = (isset($server['HTTP_HOST'])) ? $server['HTTP_HOST'] : '127.0.0.1';
        $endpoint = $protocol . '://' . $httpHost . $requestUri;

        return new \Rougin\Slytherin\Http\Uri($endpoint);
    }

    /**
     * Prepares the headers from the request.
     *
     * @return array
     */
    protected function prepareHeaders()
    {
        $original = headers_list();
        $modified = [];

        if (function_exists('xdebug_get_headers')) {
            $original = xdebug_get_headers();
        }

        foreach ($original as $header) {
            list($key, $value) = explode(': ', $header);

            $modified[$key] = explode(',', str_replace(', ', ',', $value));
        }

        return $modified;
    }

    /**
     * Prepares the HTTP component based from Slytherin.
     *
     * @return array
     */
    protected function prepareSlytherinHttp()
    {
        $httpMethod = (isset($_SERVER['REQUEST_METHOD'])) ? $_SERVER['REQUEST_METHOD'] : 'GET';
        $requestUri = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '/';
        $streamData = new \Rougin\Slytherin\Http\Stream(fopen('php://temp', 'r+'));

        $urlLink = $this->prepareUri($_SERVER, $requestUri);
        $headers = $this->prepareHeaders();

        $request = new \Rougin\Slytherin\Http\ServerRequest(
            '1.1', $headers, $streamData, $requestUri, $httpMethod,
            $urlLink, $_SERVER, $_COOKIE, $_GET, $_FILES, $_POST
        );

        $response = new \Rougin\Slytherin\Http\Response('1.1', $headers, $streamData, http_response_code());

        return [ $request, $response ];
    }
}
