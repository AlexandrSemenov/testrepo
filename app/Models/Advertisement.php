<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function conversations()
    {
        return $this->hasMany('App\Models\Conversation');
    }
}
