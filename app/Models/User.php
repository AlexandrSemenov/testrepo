<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function advertisements()
    {
        return $this->hasMany('App\Models\Advertisement');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function conversations()
    {
        return $this->belongsToMany('App\Models\Conversation', 'conversations_users');
    }
}
