<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayList extends Model
{
    //
    protected $table = 'play_lists';

    protected $fillable = ['user_id', 'name', 'status', 'cat_id'];

    public function user_id() {
        return $this->hasOne('App\Admin', 'id', 'user_id');
    }

    public function cat_id() {
        return $this->hasOne('App\Category', 'id', 'cat_id');
    }

}
