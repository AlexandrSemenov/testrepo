<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function advertisement()
    {
        return $this->belongsTo('App\Models\Advertisement');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'conversations_users');
    }

}
