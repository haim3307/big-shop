<?php

namespace App\Http\Controllers\CMS;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Session;

class CMSCategoryController extends CMSControlller
{
    static public $route = 'cms/category';
    static public $routeName = 'cms.category';

    public function __construct()
    {
        parent::__construct();
        self::$data['entity'] = 'category';
        self::$data['prop1'] = 'name';
    }

    public function index()
    {
        return view(self::$routeName . '.index', self::$data);
    }

    public function store(CategoryRequest $request)
    {
        Category::createNew($request);
        return redirect('cms/category');
    }

    public function create()
    {
        return view(self::$routeName . '.create', self::$data + [
                'prop1' => 'name',
            ]);

    }

    public function update($id, CategoryRequest $request)
    {
        Category::updateItem($id, $request);
        return redirect(self::$route);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view(self::$routeName . '.create', self::$data + [
                'category' => $category,
                'entityItem' => $category,
            ]);
    }

    public function show($categoryUrl)
    {
        return ($category = Category::where('url', '=', $categoryUrl)->first()) ? view(self::$routeName . '.show')->with('category', $category) : abort(404);
    }

    public function delete($categoryId)
    {
        return Category::destroy($categoryId);
    }
}
