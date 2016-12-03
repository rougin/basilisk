<?php

namespace App\Models;

/**
 * User Model
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 *
 * @\Doctrine\ORM\Mapping\Entity(repositoryClass="App\Repositories\UserRepository")
 * @\Doctrine\ORM\Mapping\Table(name="users")
 */
class User
{
    /**
     * @Id @GeneratedValue
     * @Column(name="id", type="integer", length=10)
     */
    private $id;

    /**
     * Returns the ID.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
