<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //RELAZIONE
    //category - post
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
