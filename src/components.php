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

$container->add(
    'Doctrine\ORM\EntityManager',
    Doctrine\ORM\EntityManager::create(config('database'), $config)
);

App\Facades\EntityManager::set($container->get('Doctrine\ORM\EntityManager'));

/**
 * Dependencies for JMS\Serializer\SerializerInterface
 */

$container->add(
    'JMS\Serializer\SerializerInterface',
    JMS\Serializer\SerializerBuilder::create()->build()
);

/**
 * Dependencies for Psr\Http\Message\ResponseInterface
 */

$container->add(
    'Psr\Http\Message\ResponseInterface',
    new Zend\Diactoros\Response
);

$container->add(
    'Zend\Diactoros\Response\EmitterInterface',
    new Zend\Diactoros\Response\SapiEmitter
);

/**
 * Dependencies for Psr\Http\Message\RequestInterface
 */

$container->add(
    'Psr\Http\Message\RequestInterface',
    Zend\Diactoros\ServerRequestFactory::fromGlobals()
);

/**
 * Dependencies for Rougin\Slytherin\Debug\DebuggerInterface
 */

$container->add(
    'Rougin\Slytherin\Debug\DebuggerInterface',
    new Rougin\Slytherin\Debug\WhoopsDebugger(new Whoops\Run)
);

/**
 * Dependencies for Rougin\Slytherin\Dispatching\RouterInterface and 
 * Rougin\Slytherin\Dispatching\DispatcherInterface
 */

$container->add(
    'Rougin\Slytherin\Dispatching\RouterInterface',
    new Rougin\Slytherin\Dispatching\Router(require 'routes.php')
);

$container->add(
    'Rougin\Slytherin\Dispatching\DispatcherInterface',
    new Rougin\Slytherin\Dispatching\Dispatcher(
        $container->get('Rougin\Slytherin\Dispatching\RouterInterface')
    )
);

/**
 * Integrates all components into Slytherin
 */

$components = new Rougin\Slytherin\Components;

$components
    ->setContainer($container)
    ->setDispatcher($container->get('Rougin\Slytherin\Dispatching\DispatcherInterface'))
    ->setDebugger($container->get('Rougin\Slytherin\Debug\DebuggerInterface'))
    ->setHttp(
        $container->get('Psr\Http\Message\RequestInterface'),
        $container->get('Psr\Http\Message\ResponseInterface')
    );

return $components;