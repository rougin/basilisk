<?php

namespace App\Routes;

use App\Depots\UserDepot;
use Rougin\Weasley\Route;

/**
 * @package App
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class Users extends Route
{
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(UserDepot $user)
    {
        return $this->json($user->all());
    }
}
