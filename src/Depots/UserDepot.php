<?php

namespace App\Depots;

use App\Models\User;

/**
 * @package App
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class UserDepot
{
    /**
     * @var \App\Models\User
     */
    protected $user;

    /**
     * @param \App\Models\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return array<string, mixed>[]
     */
    public function all()
    {
        $result = $this->user->all();

        $items = array();

        foreach ($result as $item)
        {
            $row = ['id' => $item->id];

            $row['name'] = $item->name;

            $row['email'] = $item->email;

            $items[] = $row;
        }

        return (array) $items;
    }
}
