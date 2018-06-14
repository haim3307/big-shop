<?php

namespace App;

use DB, Session, File, Toastr, Image;

class Product extends MainModel
{
    //
    protected $fillable = ['title', 'url', 'description', 'price', 'category_id', 'main_img'];

    static public function createNew($request)
    {
        $product = new self($request->all() + ['main_img' => 'default.png']);
        if ($category = Category::findOrFail($request->category_id)) {
            if ($product->save() && $request->hasFile('main_img')) {
                $path = public_path("_img/products/$category->url/");
                File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
                $file = $request->file('main_img');
                $fileName = self::randomFileName($file);
                if ($file->move($path, $fileName)) {
                    $img = Image::make($path . '/' . $fileName);
                    $img->resize(400, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save();
                    $product->update(['main_img' => $fileName]);
                }
                /*                Session::flash('categoryCreated','New category has been added!');*/
            }
            return Toastr::success('New Product Created!');
        }
        Toastr::error('Product has not been created');
    }

    static public function updateItem($id, $request)
    {
        $product = self::findOrFail($id);
        if (isset($product)) {
            if ($product->update($request->all())) {
                $oldCategory = Category::find($product->category_id);
                $pFolder = '_img/products/' . $oldCategory->url;
                if ($request->hasFile('main_img')) {
                    $file = $request->file('main_img');
                    $pathFolder = public_path($pFolder);
                    $fileName = self::randomFileName($file);
                    if ($file->move($pathFolder, $fileName)) {
                        $img = Image::make($pathFolder . '/' . $fileName);
                        $img->resize(400, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $img->save();
                        $product->update(['main_img' => $fileName]);
                    }
                    $product->update(['main_img' => $fileName]);
                } else if (isset($product->main_img) && $product->category_id != $request->category_id) {
                    $newCategory = Category::find($request->category_id);
                    File::move(public_path($pFolder . $oldCategory->url . '/' . $product->main_img), public_path($pFolder . $newCategory->url));
                }
                return Toastr::success('Product updated successfully!');
            }
        }
        Toastr::error('Product was not updated successfully!');

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'trending', 'id');
    }

    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /*    public function filters(){
            return $this->hasManyThrough(Filter::class,Category::class,);
            return $this->hasManyThrough('Contact', 'Account', 'owner_id')->join('orders','contact.id','=','orders.contact_ID')->select('orders.*');

        }*/
    public function allOfCategory($category_id)
    {
        return $this->where('category_id', '=', $category_id)->get();
    }

    public function relatedProducts(&$data)
    {
        $data = self::inRandomOrder()->take(4)->addCategory($this->category_id)->where('products.id','!=',$this->id)->select('products.*', 'c.url as c_url')->get();
    }

    static public function deals(&$data)
    {
        $data = self::from('products as p')->join('deals as d', 'p.id', '=', 'd.product_id')->join('categories as c', 'p.category_id', '=', 'c.id')->select('p.*', 'd.*', 'c.url as c_url')->orderBy('order')->get();
    }

    static public function getTagged($tag_name, &$data)
    {
        $data = self::from('products_tags as pt')->join('products as p', 'p.id', '=', 'pt.product_id')->join('categories as c', 'c.id', '=', 'p.category_id')->join('tags as t', 't.id', '=', 'pt.tag_id')->select('p.*', 'c.url as c_url')->where('t.name', '=', $tag_name)->limit(4)->get();
    }

    static public function searchProductWithRoute($id)
    {
        return self::from('products as p')->where('p.id', '=', $id)->join('categories as c', 'p.category_id', '=', 'c.id')->select('p.*', 'c.url as c_url');
    }

    static public function getItemPage($itemTitle, $mainCategory)
    {
        return self::where('products.url', '=', $itemTitle)
            ->join('categories as c', 'c.id', '=', 'products.category_id')->where('c.url', '=', $mainCategory)->select('products.*', 'c.url as c_url', 'c.name as c_name')->first();
    }

    static public function joinCategory($query)
    {
        return $query->join('categories as c', 'c.id', '=', 'products.category_id');
    }

    public function scopeAddCategory($query,$categoryId = null)
    {
        $query->join('categories as c', 'c.id', '=', 'products.category_id');
        if($categoryId) $query->where('c.id',$categoryId);
        return $query;
    }

    static public function productsWithCategory()
    {
        return self::from('products')->join('categories as c', 'c.id', '=', 'products.category_id')->select('products.*', 'c.url as c_url');
    }

    static public function frameItems(&$data)
    {
        $data['frameItems'] = self::from('products as p')->join('categories as c', 'p.category_id', '=', 'c.id')->select('p.*', 'c.url as c_url')->limit(10)->get();
    }

    /*    static public function headItems(&$data)
        {
            $data['headItems'] = DB::table('main_slide as ms')->join('products as p', 'p.id', '=', 'ms.product_id')->join('categories as c', 'p.category_id', '=', 'c.id')->select('p.*', 'c.url as c_url', 'ms.*')->get()->toArray();
        }*/
}
