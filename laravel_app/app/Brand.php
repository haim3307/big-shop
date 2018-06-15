<?php

namespace App;

class Brand extends MainModel
{
    public function products(){
        return $this->belongsToMany(Product::class);
    }
    static public function getSelected($request){
        $selectedBrandIds = [];
        foreach ($request->query() as $key => $item) {
            if ($item == 'on' && is_numeric($id = str_replace('check-box-', '', $key))) {
                $selectedBrandIds[] = (integer)$id;
            }
        }
    }
}
