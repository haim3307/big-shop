<?php

namespace App\Http\Controllers\CMS;

use App\Http\Requests\TagRequest;
use Illuminate\Http\Request;
use App\Tag,Session;

class CMSTagController extends CMSControlller
{
    static public $route = 'cms/tag';
    static public $routeName = 'cms.tag';
    public function __construct()
    {
        parent::__construct();
        self::$data['entity'] = 'tag';
        self::$data['prop1'] = 'name';
    }
    public function index()
    {
        return view('cms.tag.index',self::$data);
    }
    public function create()
    {
        return view(self::$routeName.'.create',self::$data);
    }
    public function edit($id){
        return view(self::$routeName.'.create',self::$data+['entityItem'=>Tag::findOrFail($id)]);
    }
    public function update($id, TagRequest $request)
    {
        Tag::updateItem($id,$request);
        return redirect(self::$route);
    }
    public function store(Request $request)
    {
        if(Tag::create($request->all())){
            Session::flash('cms_status', $status = 1);
            Session::flash('cms_m', $msg = 'New Tag Added Successfully');
        }

        return redirect(self::$route);

    }
    public function destroy($tagId)
    {
        return Tag::destroy($tagId);
    }

}
