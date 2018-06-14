<?php

namespace App\Http\Controllers\CMS;

use App\{
    Product, Http\Requests\ProductRequest
};
use Illuminate\Http\Request;

class CMSProductController extends CMSControlller
{
    static public $route = 'cms/product';
    static public $routeName = 'cms.product';

    public function __construct()
    {
        parent::__construct();
        self::$data['entity'] = 'product';
    }

    public function index()
    {
        return view('cms.product.index', self::$data + ['items'=>Product::all()]);
    }

    public function store(ProductRequest $request)
    {
        Product::createNew($request);
        return redirect(self::$route . '/create');
    }

    public function create()
    {
        return view(self::$routeName . '.create', self::$data);

    }

    public function update($id, ProductRequest $request)
    {
        Product::updateItem($id, $request);
        return redirect(self::$route);
    }

    public function edit($id)
    {
        return view(self::$routeName . '.create', self::$data + ['entityItem' => Product::findOrFail($id)]);
    }

    public function show($productUrl)
    {
        return ($product = Product::where('url', '=', $productUrl)->first()) ? view('cms.product.show')->with('product', $product) : abort(404);
    }
    public function delete($productId)
    {
        return Product::destroy($productId);
    }
}
