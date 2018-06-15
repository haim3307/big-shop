<?php

namespace App\Http\Controllers;

use App\PageList;
use DB, App\Tag;

class AjaxAutoCompleteController extends MainController
{
    public function searchEntities($search,$entityId = null,$hasOptions = null)
    {
        $where = isset($entityId)?" AND se.entity_id = $entityId ":'';
        $addHasOptions = $hasOptions?' ,1 AS hasOptions ':'';
        return DB::select("SELECT se.* $addHasOptions FROM (SELECT p.id,p.title,p.url,p.main_img AS img,4 AS entity_id,e.base_url,p_c.url AS base_url_var_val,e.img_path,e.name AS e_name FROM products p JOIN entities e ON e.id = 4 JOIN categories AS p_c ON p.category_id = p_c.id UNION
SELECT c.id,c.name,c.url,c.img AS title ,1 AS entity_id,e.base_url,NULL AS base_url_var_val,e.img_path ,e.name AS e_name FROM categories c JOIN entities e ON e.id = 1) AS se WHERE title LIKE :search $where LIMIT 10", [':search' => "$search%"]);
    }

    public function getTags()
    {
        return Tag::all();
    }

    public function getByListType($listUrl,$toSearch){
        $list = PageList::where('url',$listUrl)->first();

        if(!empty($list->entity_id) || !empty($list->options_layout)){
            return $this->searchEntities($toSearch,!empty($list->entity_id)?$list->entity_id:null,!empty($list->options_layout));
        }
        else return $this->searchEntities($toSearch);

    }
}
