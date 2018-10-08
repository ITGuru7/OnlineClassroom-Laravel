<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function registers()
    {
        return $this->hasMany('App\Models\Register');
    }

    public function user_register($user_id)
    {
        return $this->registers()->where('user_id', $user_id)->first();
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function user_posts($user_id)
    {
        return $this->posts()->where('user_id', $user_id)->get();
    }
}
