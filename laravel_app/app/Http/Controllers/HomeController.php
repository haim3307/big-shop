<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart,DB;

class HomeController extends MainController
{
    //
    public function index()
    {
        self::setTitle('Home');
        Product::headItems(self::$data);
        Product::frameItems(self::$data);
        Product::getTagged('featured',self::$data['cubeItems']);
        Product::getTagged('man',self::$data['cateItems']);
        return view('main-pages.home', self::$data);
    }

    public function byTag($tagName)
    {
        if(in_array($tagName, ['man', 'women'])) {
            Product::getTagged($tagName,self::$data['tagged']);
            return self::$data['tagged'];
        }else abort(404);
    }
}
