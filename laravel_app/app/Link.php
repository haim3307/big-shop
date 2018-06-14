<?php

namespace App;

use Kamaln7\Toastr\Toastr;
use Session;

class Link extends MainModel
{
    protected $fillable = ['title','url'];
    public function page(){
        return $this->belongsTo(Page::class);
    }
    static public function createNew($request){
        if(self::create($request->all())){
            Session::flash('cms_status', $status = 1);
            Session::flash('cms_m', $msg = 'New Link Added Successfully');
        }
    }
    static public function updateItem($id, $request)
    {

        if (self::findOrFail($id)->update($request->all())) {
            Toastr::success('Link updated successfully!');
        }else Toastr::warning('Link was not updated successfully!');
    }
}
