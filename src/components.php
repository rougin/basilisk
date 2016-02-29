<?php

$container = new Rougin\Slytherin\IoC\Container;

/**
 * Dependencies for Doctrine\ORM\EntityManager
 */

$config = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    config('doctrine.model_paths'),
    config('doctrine.developer_mode')
);

$config->setProxyDir(config('doctrine.proxy_path'));
$config->setAutoGenerateProxyClasses(config('doctrine.developer_mode'));

$database = config('database.mysql');

$entityManager = Doctrine\ORM\EntityManager::create($database, $config);

App\Facades\EntityManager::set($entityManager);

$container->add('Doctrine\ORM\EntityManager', $entityManager);

/**
 * Dependencies for JMS\Serializer\SerializerInterface
 */

$serializer = JMS\Serializer\SerializerBuilder::create()->build();

App\Facades\Serializer::set($serializer);

$container->add('JMS\Serializer\SerializerInterface', $serializer);

/**
 * Dependencies for Psr\Http\Message\ResponseInterface
 */

$response = new Zend\Diactoros\Response;

Landslide\Facades\Response::set($response);

$container->add('Psr\Http\Message\ResponseInterface', $response);

/**
 * Dependencies for Psr\Http\Message\RequestInterface
 */

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals();

$container->add('Psr\Http\Message\RequestInterface', $request);

/**
 * Dependencies for Rougin\Slytherin\Debug\DebuggerInterface
 */

$debugger = new Rougin\Slytherin\Debug\WhoopsDebugger(new Whoops\Run);

$debugger->setEnvironment(config('app.environment'));

$container->add('Rougin\Slytherin\Debug\DebuggerInterface', $debugger);

/**
 * Dependencies for Rougin\Slytherin\Dispatching\RouterInterface and 
 * Rougin\Slytherin\Dispatching\DispatcherInterface
 */

$routes = require 'routes.php';
$router = new Rougin\Slytherin\Dispatching\Router($routes);
$dispatcher = new Rougin\Slytherin\Dispatching\Dispatcher($router);

$container->add('Rougin\Slytherin\Dispatching\RouterInterface', $router);
$container->add('Rougin\Slytherin\Dispatching\DispatcherInterface', $dispatcher);

/**
 * Integrates all components into Slytherin
 */

$components = new Rougin\Slytherin\Components;

$components
    ->setContainer($container)
    ->setDispatcher($dispatcher)
    ->setDebugger($debugger)
    ->setHttp($request, $response);

return $components;
