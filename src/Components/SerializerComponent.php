<?php

namespace App\Components;

use JMS\Serializer\SerializerBuilder;
use Interop\Container\ContainerInterface;

use Rougin\Slytherin\Component\AbstractComponent;

/**
 * Serializer Component
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class SerializerComponent extends AbstractComponent
{
    /**
     * Sets the component and add it to the container of your choice.
     *
     * @param  \Interop\Container\ContainerInterface $container
     * @return void
     */
    public function set(ContainerInterface &$container)
    {
        $serializer = SerializerBuilder::create()->build();

        $container->add('JMS\Serializer\SerializerInterface', $serializer);

        return;
    }
}
