<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    Category, Brand, Http\Requests\CategoryRequest, Product
};

class ShopController extends MainController
{
    public function index()
    {
        self::$data['title'] .= 'Shop';
        self::$data['categories'] = Category::orderBy('order')->get();
        return view('main-pages.shop', self::$data);
    }

    public function show($main_category, $subCategory = 'all', $page = 1,Request $request)
    {
        $main_category = Category::getByNameOrUrl($main_category);
        if ($main_category) {
            $selectedBrandIds= Brand::getSelected($request);
            //items source
            Category::getCategoryProducts($main_category,$selectedBrandIds,$request,self::$data);

            $request->flash();
            self::setTitle('Shop | ' . ucwords($main_category->name));
            self::$data += [
                'category' => $main_category,
                'page' => $page,
                'selected_category' => $main_category,
                'categories' => Category::orderBy('order')->get(),
            ];
            return view('main-pages.categories-page', self::$data);
        } else abort(404);
    }

    public function productPage($mainCategory, $itemTitle)
    {
        $item = Product::getItemPage($itemTitle, $mainCategory);
        if (!$item) self::notFound();
        self::$data['relatedProducts'] = [];
        $item->relatedProducts(self::$data['relatedProducts']);
        self::setTitle($item->title);
        self::$data += [
            'selected_sub_category' => (object)['name' => $mainCategory],
            'category' => (object)['name' => $mainCategory],
            'item' => $item,
            'reviews' => [
                (object)[
                    "user" => (object)["first_name" => 'Daniel', "last_name" => 'Israel', "profile_img" => "http://via.placeholder.com/50x50"],
                    "content" => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi
                                        blanditiis consectetur error,
                                        et, eum illo illum mollitia nisi perferendis placeat, recusandae rem sequi sint
                                        temporibus totam veniam. Amet, at dicta, dolorem doloribus ducimus eaque est et
                                        maiores maxime neque non odio quae repellat sequi sint suscipit vel.
                                        Exercitationem, libero.'
                ],
                (object)[
                    "user" => (object)["first_name" => 'Rina', "last_name" => 'Oziel', "profile_img" => "http://via.placeholder.com/50x50"],
                    "content" => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi
                                        blanditiis consectetur error,
                                        et, eum illo illum mollitia nisi perferendis placeat, recusandae rem sequi sint
                                        temporibus totam veniam. Amet, at dicta, dolorem doloribus ducimus eaque est et
                                        maiores maxime neque non odio quae repellat sequi sint suscipit vel.
                                        Exercitationem, libero.'
                ]
            ]
        ];
        return view('main-pages.product', self::$data);
    }
}
