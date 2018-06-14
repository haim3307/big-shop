<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\{
    EntityItem, MenuItem,Menu
};
use Session,URL,File,DB;
class CMSMenusController extends CMSControlller
{
    public function index()
    {
        self::$data['menus'] = Menu::with('items')->get();
        self::$data['selected_menu'] = self::$data['menus']->first();
        return view('cms.menus',self::$data);
    }
    public function store(Request $request){
        $message = 'Changes Canceled!';
        $status = 0;
        if($request->apply){
            $i = 1;
            foreach (explode(',',$request->nav_order) as $id){
                MenuItem::find($id)->update(['order'=>$i++]);
            }
            $message = 'Changes Applied!';
            $status = 1;
        }
        Session::flash('cms_m',$message);
        Session::flash('cms_status',$status);
        return redirect('cms/menus');
    }
    public function addItem(Menu $menu,Request $request){
        $item = EntityItem::getByIds($request->entityId,$request->entityItemId);
        if(isset($item->id)){
            if(isset($item->name)) $item->title = $item->name;
            $menuItemId = DB::table('menu_items')->insertGetId([
                'title' => $item->title,
                'entity_id' => $request->entityId,
                'entity_item_id' => $request->entityItemId,
                'menu_id' => $menu->id
            ]);
            return MenuItem::find($menuItemId);
        }
    }
    public function delete($id){
        return MenuItem::destroy($id);
    }
    public function update($id,Request $request){
        if(($menuItem = MenuItem::find($id)) && isset($request->menuItemTitle)){
            $menuItem->title = $request->menuItemTitle;
            $menuItem->save();
            return 1;
        }
        else return -1;
    }
}