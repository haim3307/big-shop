<?php

namespace App;

use DB;

class MenuItem extends MainModel
{
    protected $fillable = ['order','title'];
    public function entities(){
        return $this->hasMany('entities');
    }
    public function entity(){
        return $this->belongsTo(Entity::class);
    }
    public function customUrl(){

        $entity = $this->entity;
        $args = ['url'];
        if($entity->name == 'product') $args[] = 'category_id';
        $entityItem = EntityItem::get($entity,$this->entity_item_id,$args);
        if(isset($entityItem) && isset($entityItem->url)) {
            if($entity->name == 'product' and $category = Category::find($entityItem->category_id))
                $entity->base_url = str_replace('{category-url}',$category->url,$entity->base_url);
            $this->calc_url = !empty($entity->base_url) || preg_match('/((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)/',$entity->base_url)?url($entity->base_url.$entityItem->url):$entityItem->url;
            $this->save();
            return $this->calc_url;
        }
        else{
            try{
                $this->delete();
            }catch (\Exception $exception){
                return $exception;
            }
            return 0;
        }
    }
    static public function updateLinksUrl($links){
        $links->each(function ($link){$link->customUrl();});
    }
}
