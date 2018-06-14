<?php

namespace App;

use DB, Session;
use Toastr;

class Page extends CMSModel
{
    protected $fillable = ['content', 'url', 'title'];

    public function lists()
    {
        return $this->hasMany(PageList::class);
    }

    public function items()
    {
        return $this->hasManyThrough(PageListItem::class, PageList::class);
    }

    static public function getListsItems($url, &$data, $modifyListsKeys = true)
    {
        $data['page'] = self::with('lists', 'lists.items')->where('url', $url)->first();
        $data['lists'] = $data['page']->lists;
        if ($modifyListsKeys) $data['lists'] = $data['lists']->keyBy('url');

        $data['lists']->transform(function ($list) use($modifyListsKeys) {
           $list->items->transform(function ($item) use ($list,$modifyListsKeys) {
                if($item->entity_id) $item->setEntityItem();
                if(isset($item->entityItem))$item->entityItem->setItemBaseUrl($item->entity);
                if (isset($item->entityItem))$item->entityItem->setItemImgPath($item->entity);
                $item = (object)$item->toArray();
                if (!empty($item->options)) {
                    $item->options = json_decode($item->options);
                    if(isset($item->entityItem)) $item->entityItem->options = $item->options;
                }
                /*$item->img_path = $item->entityItem->img_path;
                $item->base_url = $item->entityItem->base_url;*/
                $item->list_item_id = $item->id;
                $item->list_id = $item->page_list_id;
                $item->hasOptions = $list->options_layout ? true : false;
                return $item;

            });
           return !$modifyListsKeys?$list:$list->items;

        });
    }

    static public function createNew($request)
    {
        if (($page = new self($request->all()))->save()) {
            $msg = 'page created successfully';
            if ($request->add_to_nav) {
                if (self::from('menu_items')->insert([
                    'entity_id' => $page->entity()->id,
                    'entity_item_id' => $page->id,
                    'menu_id' => 1,
                    'title' => $page->title,
                ])) $msg .= ' and added to nav';
            }
            return Toastr::success($msg);
        } else Toastr::error("can't save page");

    }

    static public function updateOrder($customPage, $listUrl, $request)
    {
        $page = self::where('url', $customPage)->first();
        if (!$page) abort(404);
        $list = PageList::where('url', $listUrl)->first();
        if (!$list) abort(404);
        if (isset($request->order)) {
            $request->order = explode(',', $request->order);
            for ($i = 1; $i <= count($request->order); $i++) {
                $item = PageListItem::where([['page_list_id', '=', $list->id], ['id', '=', $request->order[$i - 1]]]) and $item->update(['order' => $i]);
            }
        }
    }
}
