<?php

namespace App;

use Rougin\Slytherin\Component\Collector;

/**
 * Application Helper Test
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ApplicationTest extends TestCase
{
    /**
     * Tests the application.
     *
     * @return void
     */
    public function testApplication()
    {
        $this->expectOutputRegex('/Hello/');

        (new \Rougin\Slytherin\Application($this->components))->run();
    }

    /**
     * Tests the sample Doctrine model.
     *
     * @return void
     */
    public function testDoctrineModel()
    {
        $container  = $this->components->getContainer();
        $expectedId = 1;

        $entityManager  = $container->get('Doctrine\ORM\EntityManager');
        $userRepository = $entityManager->getRepository('App\Models\User');

        $user = $userRepository->find($expectedId);

        $this->assertEquals($expectedId, $user->getId());
    }
}
