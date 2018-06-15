<?php

namespace App\Http\Controllers\CMS;

use App\Http\Requests\LinkRequest;
use App\Link;
use Illuminate\Http\Request;
use Session,URL,File;
class CMSLinksController extends CMSControlller
{
    static public $route = 'cms/link';
    static public $routeName = 'cms.link';

    public function __construct()
    {
        parent::__construct();
        self::$data['entity'] = 'link';
    }
    public function index()
    {
        return view(self::$routeName.'.index',self::$data);
    }
    public function store(LinkRequest $request)
    {
        Link::createNew($request);
        return redirect(self::$route);
    }

    public function create()
    {
        return view('cms.model.create', self::$data);

    }

    public function update($id, LinkRequest $request)
    {
        Link::updateItem($id, $request);
        return redirect(self::$route);
    }

    public function edit($id)
    {
        return view('cms.model.create', self::$data + ['entityItem' => Link::findOrFail($id)]);
    }

    public function show($linkUrl)
    {
        return ($link = Link::where('url', '=', $linkUrl)->first()) ? view('cms.link.show')->with('link', $link) : abort(404);
    }
    public function destroy($linkId)
    {
        return Link::destroy($linkId);
    }
}
