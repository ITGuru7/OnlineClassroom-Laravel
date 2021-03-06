<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
