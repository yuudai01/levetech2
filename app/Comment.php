<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //「1対多」の関係なので単数系に
    return $this->belongsTo('App\Comment');
}
