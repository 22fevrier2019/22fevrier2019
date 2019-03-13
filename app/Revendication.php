<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revendication extends Model
{
    protected $fillable = [
        'content','user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class,'revendication_id');
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class,'revendication_id');
    }


}
