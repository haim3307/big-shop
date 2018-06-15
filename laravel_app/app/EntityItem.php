<?php

namespace App;

use DB;
class EntityItem extends MainModel
{
    static public function get($entity,$entityItemId,$prop = '*'){
        return DB::table($entity->table)->where('id',$entityItemId)->select($prop)->first();
    }
    static public function getByIds($entityId,$entityItemId){
        return self::get(Entity::find($entityId),$entityItemId);
    }
    static public function getByIdsWhere(&$item){
        return self::getWhere($item['entity'] = Entity::find($item['entity_id']),$item);
    }
    static public function getWhere($entity,$entityItem){
        $query = self::from($entity->table)->where("$entity->table.id",$entityItem->entity_item_id);
        if(method_exists ( EntityItem::class , $entity->name )) $query = call_user_func(self::class.'::'.$entity->name,$query);
        $item = (object)$query->first();
        $item->list_item_id = $entityItem->id;
        $item->list_id = $entityItem->page_list_id;
        $item->base_url = isset($item->c_url)?Page::getItemBaseUrl($entity,$item->c_url):$entity->base_url;
        $item->img_path = isset($item->c_url)?Page::getItemImgPath($entity,$item->c_url):$entity->img_path;
        if(!empty($entityItem['options'])) $item->options = json_decode($entityItem['options']);

        return $item;
    }


}
