<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlbumCreateForm extends Model
{
    public function getArtistList()
    {
        return DB::table('albums')->lists('artist');
    }
    public function getAlbumsList()
    {
        return DB::table('albums')->lists('title');
    }
}
