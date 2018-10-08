<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|max:16|alpha'
    ];

    public function registers()
    {
        return $this->hasMany('App\Models\Register');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
