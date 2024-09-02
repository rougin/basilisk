<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @package App
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class User extends Model
{
    /**
     * @var string[]
     */
    protected $fillable =
    [
        'name',
        'password',
        'email',
    ];

    /**
     * @var string[]
     */
    protected $hidden =
    [
        'password'
    ];

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * Sets the user's password as hashed.
     *
     * @param string $value
     *
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_BCRYPT);
    }
}
