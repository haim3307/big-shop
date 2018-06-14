<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class SuperController extends Controller
{
    static public $data = ['title'=>''];
    static public function connectPage($url,$modifyListsKeys = true){
        Page::getListsItems($url,self::$data,$modifyListsKeys);
    }
    static public function setPage($page){
        self::$data['page'] = Page::where('url','=',$page)->first();
    }
}
