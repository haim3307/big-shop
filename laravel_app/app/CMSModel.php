<?php

namespace App;

class CMSModel extends MainModel
{
    public function getLinks(){
        return MenuItem::where([['entity_id',$this->entity()->id],['entity_item_id',$this->id]])->get();
    }
    public function entity(){
        return Entity::where('table',$this->getTable())->first();
    }
}
