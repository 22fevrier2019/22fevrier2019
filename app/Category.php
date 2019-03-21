<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','french','arabe'];


    public function translations(){
        return $this->hasMany(Categoriestranslation::class, 'category_id');
    }


    public function revendications(){
        return $this->hasMany('App\Revendication','category_id');
    }
}
