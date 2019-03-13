<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    protected $fillable = [
        'revendication_id','user_id'
    ];
}
