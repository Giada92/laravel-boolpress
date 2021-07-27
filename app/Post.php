<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id'
    ];

    //RELAZIONE
    //post -category
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
