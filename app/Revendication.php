<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revendication extends Model
{
    protected $fillable = [
        'content','user_id','category_id','lang'
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

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }

    public function scopeByOrder($query, $order)
    {
        if ($order === 'newest'){
            return $query->orderBy('created_at','desc');
        }

        if ($order === 'popular'){
             $query->withCount('likes')->orderBy('likes_count', 'desc');
        }

    }

    public function scopeByCategory($query, $category)
    {
        if ($category == 0) {
            return $query;
        }
        return $query->where('category_id', $category);
    }

}
