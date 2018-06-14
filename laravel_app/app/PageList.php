<?php

namespace App;

use DB;

class PageList extends MainModel
{
    protected $table = 'page_lists';
    public function entity(){
        return $this->belongsTo(Entity::class);
    }
    static public function ofPage(&$data, $page)
    {
        /*
        if ($lists = self::with('items')->where('page_id', $page->id)->get()) {
            $lists = $lists->toArray();
            foreach ($lists as $key => $list) {
                foreach ($list['items'] as $itemKey=>$item) {
                    dd($list->entity_id);
                    PageListItem::getItemStat($list['items'][$itemKey],$list->entity_id);
                    $list['items'][$itemKey]->list_item_id = $item['id'];
                }
                $lists[$list['url']] = $list;
                unset($lists[$key]);
            }
            $data['lists'] = $lists;
        }*/
    }

    /*public function ofPage(&$data,$page){
        if($lists = self::where('page_id',$page->id)->get()){

        }
    }*/
    public function items()
    {
        return $this->hasMany(PageListItem::class)->orderBy('order');
    }

}
