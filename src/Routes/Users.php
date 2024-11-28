<?php

namespace App\Routes;

use App\Depots\UserDepot;
use Rougin\Weasley\Route;

/**
 * @package [NAME]
 *
 * @author [AUTHOR] <[EMAIL]>
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
