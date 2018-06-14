<?php

namespace App;

class WishListItem extends MainModel
{
    protected $table = 'wish_list';
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
