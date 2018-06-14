<?php

namespace App;

class UserInfo extends MainModel
{
    protected $fillable = ['first_name','last_name','phone'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
