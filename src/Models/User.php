<?php

namespace App\Models;

/**
 * User Model
 *
 * @package App
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class User extends \Illuminate\Database\Eloquent\Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('name', 'email', 'password');

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Sets the user's password.
     *
     * @param  string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_BCRYPT);
    }
}
