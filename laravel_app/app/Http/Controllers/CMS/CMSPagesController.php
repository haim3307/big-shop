<?php

namespace App\Http\Controllers\CMS;

use App\{
    Category, Entity, Http\Requests\ListItemRequest, Http\Requests\PageRequest, MenuItem, PageList, PageListItem, Page, Http\Requests\CustomPageRequest
};
use DB, Route, Session;
use Illuminate\Http\Request;

class CMSPagesController extends CMSControlller
{
    static public $route = 'cms/page';
    static public $routeName = 'cms.page';

    public function __construct()
    {
        parent::__construct();
        self::$data['page'] = (object)['title' => explode('@', Route::current()->action['uses'])[1]];
        self::$data['entity'] = 'page';
    }

    public function index()
    {
        return view(self::$routeName . '.index', self::$data + ['items' => Page::all()]);
    }

    public function create()
    {
        return view(self::$routeName . '.create', self::$data);
    }

    public function update($customPage, PageRequest $request)
    {
        $customPage = Page::where('id', $customPage)->orWhere('url', $customPage);
        $customPage->update(['title' => $request->title, 'url' => $request->url, 'content' => $request->page_content]);
        self::updateFollow($customPage->first());
        return redirect($request->url() . "?manage_mode=$request->manage_mode");
    }

    public function edit($url)
    {

        return view(self::$routeName . '.create', self::$data + ['entity' => 'page', 'entityItem' => Page::where('url', $url)]);
    }

    public function updateOptions($customPage, $listItemId, Request $request)
    {
        $item = PageListItem::findOrFail($listItemId);
        return $item->update(['options' => json_encode($request->options)]) ? 1 : 0;
    }

    public function updatePageListItem(Page $page,PageList $pageList, Request $request)
    {
        if(!isset($request->item_id) or !($listItem = PageListItem::findOrFail($request->item_id))) abort(404);
        if ($rules = json_decode($pageList->validate_layout, true)) $this->validate($request, $rules);
        PageListItem::updateItemOptions($request, $pageList, $listItem);
        return redirect(self::$route . "/$page->url/$pageList->url/");

    }


    public function editPageListItem($page, PageList $pageList, PageListItem $listItem)
    {
        if (!($page = Page::where('url', $page)->first())) return;
        $pageList->options_layout = json_decode($pageList->options_layout);
        if ($pageList->options_layout) {
            $listItem->options = json_decode($listItem->options);
            self::$data['page']->id = $page->id;
            return view(self::$routeName . '.list.edit', self::$data + ['pageList' => $pageList, 'listItem' => $listItem]);
        } else return redirect(self::$route);

    }

    public function createPageListItem($page, PageList $pageList)
    {
        if (!($page = Page::where('url', $page)->first())) return;
        $pageList->options_layout = json_decode($pageList->options_layout);
        if ($pageList->options_layout) {
            self::$data['page']->url = $page->url;
            return view(self::$routeName . '.list.edit', self::$data + ['pageList' => $pageList]);
        } else return redirect(self::$route);

    }

    public function deletePageListItem($listItem)
    {
        return PageListItem::destroy($listItem);

    }

    public function storePageListItem($page = null,$pageList, $itemId = null, Entity $entity = null, $saveOptions = false, Request $request)
    {

        if (!isset($pageList->id) && !($pageList = PageList::where('url', $pageList)->first())) return;
        $newItem = PageListItem::saveNew($pageList, $entity->id ?? null, $itemId, $request);
        if ($saveOptions) PageListItem::updateItemOptions($request,$pageList,$newItem);
        return $newItem;
    }

    public function createStorePageItem($page, $pageList, Request $request)
    {
        if (!($pageList = PageList::where('url', $pageList)->first())) return;
        if (!($page = Page::where('url', $page)->first())) return;
        self::storePageListItem($page,$pageList, null, null, true, $request);
        return redirect(self::$route . "/$page->url/$pageList->url");
    }

    public function store(PageRequest $request)
    {
        Page::createNew($request);
        return redirect(self::$route);
    }

    public function delete($pageID)
    {
        MenuItem::where([['entity_id', '=', 2], ['entity_item_id', '=', $pageID]])->delete();
        return Page::destroy($pageID);
    }

    public function home($pageList = null)
    {
        self::connectPageManage('home', $pageList);
        return view(self::$routeName . '.home', self::$data);
    }


    public function updateOrder($customPage, $listUrl, Request $request)
    {
        Page::updateOrder($customPage, $listUrl, $request);
        return redirect(self::$route . "/$customPage/$listUrl/?manage_mode=$request->manage_mode");

    }

    public function about($pageList = null)
    {
        self::connectPageManage('about', $pageList);
        return view(self::$routeName . '.about', self::$data);
    }

    public function deals($pageList = null)
    {
        self::setTitle('Deals');
        self::connectPageManage('deals', $pageList);
        return view(self::$routeName . '.deals', self::$data);

    }

    public function shop($pageList = null, Request $request)
    {
        if (isset($request->order)) {
            Category::orderShop($request);
            return redirect(url(self::$route . '/shop?manage_mode=' . $request->manage_mode));
        } else {
            self::setTitle('Shop');
            self::connectPageManage('shop', $pageList);
            self::$data['categories'] = Category::orderBy('order')->get();
            return view(self::$routeName . '.shop', self::$data);

        }

    }
    public function sale($pageList = null){
        self::connectPageManage('sale', $pageList);
        return view(self::$routeName . '.sale', self::$data);
    }
    public function contactUs($pageList = null)
    {
        self::connectPageManage('contact-us', $pageList);
        return view(self::$routeName . '.contact-us', self::$data);
    }

    /*    public function storeShop(){

        }*/
    public function custom($customPage, $pageList = null)
    {
        if ($page = Page::where('url', $customPage)->orWhere('id', $customPage)->first()) {
            self::$data['page'] = $page;
            return view()->exists(self::$routeName . '.' . $customPage) ? view(self::$routeName . '.' . $customPage, self::$data) : view(self::$routeName . '.custom', self::$data);
        } else return abort(404);

    }

}
