<?php

namespace App\Http\Controllers;

use App\{
    Brand, Category
};
use Illuminate\Http\Request;

class MainController extends SuperController
{
    public function __construct()
    {
        self::$data['title'] = 'Big Shop | ';
    }

    static public function setTitle($title){
        self::$data['title'] .= $title;
    }
    static public function setMetaDesc($metaDesc){
        self::$data['metaDesc'] = $metaDesc;
    }
    static public function notFound(){
        self::setTitle('Page Not Found');
        abort(404);
    }
}
