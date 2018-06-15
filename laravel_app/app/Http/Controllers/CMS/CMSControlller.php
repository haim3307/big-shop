<?php

namespace App\Http\Controllers\CMS;
use App\Http\Controllers\SuperController;
use App\MenuItem;
use App\PageList;
use Illuminate\Support\Facades\Session;

class CMSControlller extends SuperController
{
    public function __construct()
    {
        self::$data['title'] = 'CMS | ';
    }
    static public function connectPageManage($url,$pageListUrl = null){
        if($pageListUrl && ($pageListUrl = PageList::where('url',$pageListUrl)->first())) self::$data['selectedList'] = $pageListUrl->url;
        self::connectPage($url,false);
    }
    static public function updateFollow($entityItem){
        MenuItem::updateLinksUrl($entityItem->getLinks());
    }
    public function index(){
        return view('cms.home');
    }
    static public function setTitle($title){
        self::$data['title'] .= $title;
    }
    static public function notFound(){
        self::setTitle('Page Not Found');
        abort(404,self::$data);
    }

}
