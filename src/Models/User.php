<?php

namespace App\Models;

/**
 * User Model
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 * 
 * @\Doctrine\ORM\Mapping\Entity(repositoryClass="App\Repositories\UserRepository")
 * @\Doctrine\ORM\Mapping\Table(name="user")
 */
class User
{
    /**
     * @\Doctrine\ORM\Mapping\Id @\Doctrine\ORM\Mapping\GeneratedValue
     * @\Doctrine\ORM\Mapping\Column(name="id", type="integer", length=10)
     */
    private $id;

    /**
     * @\Doctrine\ORM\Mapping\Column(name="name", type="string", length=200)
     */
    private $name;

    /**
     * @\Doctrine\ORM\Mapping\Column(name="age", type="integer", length=2)
     */
    private $age;

    /**
     * @\Doctrine\ORM\Mapping\Column(name="gender", type="string", length=10)
     */
    private $gender;
}
