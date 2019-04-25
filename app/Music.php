<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    //
    protected $table = 'musics';

    protected $fillable = [
        'user_id',
        'cat_id',
        'playlist_id',
        'file',
        'path',
        'size',
        'file_name',
    ];


}
