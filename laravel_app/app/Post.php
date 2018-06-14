<?php

namespace App;

class Post extends MainModel
{
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
    /*
     * TODO
     * */
    }
}
