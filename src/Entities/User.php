<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * User Model
 *
 * @package App
 * @author  Rougin Gutib <rougingutib@gmail.com>
 */
class User extends Model
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
