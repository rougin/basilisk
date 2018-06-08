<?php

namespace App\Controllers;

use App\Validators\AuthValidator;
use Rougin\Authsum\Authentication;
use Rougin\Authsum\Checker\CheckerInterface;

/**
 * Authentication Controller
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class AuthController extends Authentication
{
    /**
     * @var \Rougin\Authsum\Checker\CheckerInterface
     */
    protected $checker;

    /**
     * @var \App\Validators\AuthValidator
     */
    protected $validator;

    /**
     * Initializes the controller.
     *
     * @param \Rougin\Authsum\Checker\CheckerInterface $checker
     * @param \App\Validators\AuthValidator            $validator
     */
    public function __construct(CheckerInterface $checker, AuthValidator $validator)
    {
        $this->checker = $checker;

        $this->validator = $validator;
    }

    /**
     * Returns the login page.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function login()
    {
        $post = (array) request()->getParsedBody();

        if (isset($post['email']) === true) {
            return $this->authenticate($this->checker, $post);
        }

        return view('auth.login');
    }

    /**
     * Returns the logout page.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function logout()
    {
        if (method_exists(session(), 'delete')) {
            session()->delete('user.email');

            session()->delete('user.id');

            session()->delete('user.name');
        }

        return redirect('/');
    }

    /**
     * Checks if the authentication has an occured error.
     *
     * @param  integer $type
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function error($type = self::NOT_FOUND)
    {
        $message = 'Wrong username or password.';

        session()->set('flash.errors.password', $message);

        return redirect('/auth/login');
    }

    /**
     * Checks if the authentication is successful.
     *
     * @param  mixed $match
     * @return \Psr\Http\Message\ResponseInterface
     */
    protected function success($match)
    {
        session()->set('user.email', $match->email);

        session()->set('user.id', $match->id);

        session()->set('user.name', $match->name);

        return redirect('/');
    }

    /**
     * Validates the given credentials.
     *
     * @param  array $credentials
     * @return boolean
     */
    protected function validate(array $credentials)
    {
        return $this->validator->validate($credentials);
    }
}
