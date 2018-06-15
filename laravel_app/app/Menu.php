<?php

namespace App;

use DB,Request;
class Menu extends MainModel
{
    public function items(){
        return $this->hasMany(MenuItem::class)->orderBy('order');
    }
    public function entities(){
        return $this->hasMany('entities');
    }
    static public function set_active($path, $all = true)
    {
        return Request::is($path . ($all ? '*' : '')) ? 'routeBTN' : '';
    }
    static public function clear_calc(){
        DB::table('menu_items')->update(['calc_url'=> null]);
    }
}
