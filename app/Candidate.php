<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'info',
        'about',
        'carrer',
        'picture',
        'birth_date',
        'extra_info',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'candidate_likes',
            'candidate_id','user_id');
    }

    public function scopeByOrder($query, $order)
    {
        if ($order === 'newest') {
            return $query->orderBy('created_at', 'desc');
        }

        if ($order === 'popular') {
            $query->withCount('likes')->orderBy('likes_count', 'desc');
        }

    }

    public function pictureUrl(){
        return url('img/'.$this->picture);
    }
}
