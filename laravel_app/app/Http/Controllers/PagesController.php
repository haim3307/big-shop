<?php

namespace App\Http\Controllers;

use App\{
    Contact, Http\Requests\ContactRequest, PageList, Post, Product, Page
};
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB,Session;

class PagesController extends MainController
{
    public function home(){
        self::connectPage('home');
        Product::frameItems(self::$data);
        Product::getTagged('man',self::$data['cateItems']);
        return view('main-pages.home', self::$data);
    }
    public function custom($page){
        return !self::setPage($page) && self::$data['page'] &&  !empty(self::$data['page']->content)? view('custom',self::$data):abort(404);
    }
    public function about() {
        self::connectPage('about');
        return view('main-pages.about',self::$data);
    }
    public function contact() {
        self::connectPage('contact-us');
        return view('main-pages.contact',self::$data);
    }
    public function contactPost(ContactRequest $request) {
        $contactItem = new Contact($request->all());
        if($contactItem->save()) Session::flash('thankYouContact','your message has been accepted and sent to the team!');
        return $this->contact();
    }

    public function sale() {
        self::connectPage('sale');
        return view('main-pages.sale',self::$data);
    }
    public function deals() {
        self::connectPage('deals');
        self::$data['expired_deals'] = [];
        self::$data['lists']['deals'] = self::$data['lists']['deals']->sortBy(function ($item){
            return date($item->options->end_date->value);
        });
        self::$data['lists']['deals'] = self::$data['lists']['deals']->filter(function ($item){
            $cond = date($item->options->end_date->value) > date(Carbon::now());
            if(!$cond) self::$data['expired_deals'][] = $item;
            return $cond;
        });
        return view('main-pages.deals',self::$data);
    }

}
