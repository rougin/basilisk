<?php

namespace App\Components;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

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
     * Name of the class to be added in the container.
     * 
     * @var string
     */
    protected $className = SerializerInterface::class;

    /**
     * Returns an instance from the named class.
     *
     * @return mixed
     */
    public function get()
    {
        return SerializerBuilder::create()->build();
    }
}
