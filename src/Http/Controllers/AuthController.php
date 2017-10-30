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
        $post = is_null($post = request()->getParsedBody()) ? array() : $post;

        $response = $this->authenticate($this->checker, $post);

        return isset($post['email']) ? $response : view('auth.login');
    }

    /**
     * Returns the logout page.
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function logout()
    {
        $exists = method_exists(session(), 'delete');

        ! $exists || session()->delete('user');

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
