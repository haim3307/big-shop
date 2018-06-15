<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends MainController
{
    public function index(){
        self::connectPage('blog');
        self::$data['posts'] = Post::with('author')->get();
        return view('main-pages.blog',self::$data);
    }
    public function show($post){
        self::$data['post'] = Post::getByurl($post);
        self::$data['previous'] = Post::where('id', '<', self::$data['post']->id)->first();
        // get next post id
        self::$data['next'] = Post::where('id', '>', self::$data['post']->id)->first();
        return view('blog.post',self::$data);
    }
}
