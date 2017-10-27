<?php

namespace App\Http\Controllers;

use Rougin\Authsum\Checker\CheckerInterface;

use App\Validators\AuthValidator;

/**
 * Authentication Controller
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class AuthController extends \Rougin\Authsum\Authentication
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
        if (request()->getAttribute('email') !== null) {
            $post = request()->getParsedBody();

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
        session()->delete('user');

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
