<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class MainModel extends Model
{
    public function scopeGetByUrl($query,$url){
        $query->where('url',$url)->first();
    }
    static function getByUrl($url){
        return self::where('url',$url)->first();
    }
    static public function getByNameOrUrl(&$string){
        return self::where('url', '=', $string)->orWhere('name', '=', $string)->first();
    }
    public function uploadImg($request,$path,$imgWidth = 600,$inputName = null){
        $path = public_path($path);
        if ($this->save() && $request->hasFile($inputName??'img') && $request->file($inputName??'img')->isValid()) {
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $file = $request->file($inputName??'img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            if ($file->move($path, $fileName)) {
                $img = Image::make($path . '/' . $fileName);
                $img->orientate();
                $img->resize($imgWidth, null, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                });
                $img->save();
                $this->update([$inputName??'img' => $fileName]);
            }
            return true;
        }
    }
    public function updateNavItem(){
        dd($this->entity);
    }
    static public function randomFileName($file){
        return uniqid() . '.' . $file->getClientOriginalExtension();
    }
    public function setEntityItemMain()
    {
        $query = call_user_func("App\\".$this->entity->model . '::where', "{$this->entity->table}.id",$this->entity_item_id);
        if (method_exists(self::class, $this->entity->name)) $query = call_user_func(self::class . '::' . $this->entity->name, $query);
        return $this->entityItem = $query->first();
    }

    public function setItemBaseUrl($entity){
        $this->base_url = $entity->name !== 'product'?$entity->base_url:str_replace('{category-url}',$this->c_url,$entity->base_url);
    }
    public function setItemImgPath($entity){
        $this->img_path = $entity->name !== 'product'?$entity->img_path:str_replace('{category-url}',$this->c_url,$entity->img_path);
    }
}
