<?php

namespace App;

use App\Http\Requests\CategoryRequest;
use Session, URL, File, Image, Toastr;

class Category extends MainModel
{
    //
    protected $fillable = ['name', 'url', 'img'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function filters()
    {
        return $this->belongsToMany(Filter::class);
    }

    static public function createNew($request)
    {
        $category = new self($request->all());
        if ($category->save() && $request->hasFile('img') && $request->file('img')->isValid()) {
            $path = public_path('_img/categories');
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
            $file = $request->file('img');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            if ($file->move($path, $fileName)) {
                $img = Image::make($path . '/' . $fileName);
                $img->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save();
                $category->update(['img' => $fileName]);
            }

            /*                Session::flash('categoryCreated','New category has been added!');*/
            return Toastr::success('New category has been added!');
        }
        Toastr::error('Category has not been created');
    }

    static public function updateItem($id, $request)
    {
        if (self::findOrFail($id)->update($request->all()))
            return Toastr::success('New category has been added!');
        Toastr::error('Category was not updated successfully!');

    }

    static public function orderShop($request)
    {
        $request->order = explode(',', $request->order);
        for ($i = 1; $i <= count($request->order); $i++) {
            $item = self::where('id', '=', $request->order[$i - 1]) and $item->update(['order' => $i]);
        }
    }

    static public function getCategoryProducts($main_category, $selectedBrandIds, $request, &$data)
    {
        $main_items_collection = $main_category->products();
        $min_price = $main_items_collection->min('price');
        $max_price = $main_items_collection->max('price');
        $title = trim($request->{'product-search'});
        $main_items_collection->where(function ($query) use ($request, $selectedBrandIds,$title) {
            if (!empty($title)) $query->where('title', 'like', '%' . $title . '%');
            if (!empty($selectedBrandIds)) $query->whereIn('brand_id', $selectedBrandIds);
        });
        $main_items_collection->where(function ($query) use ($request) {
            if (isset($request['max-price']) && isset($request['min-price'])) {
                if (is_numeric($request['max-price']) && is_numeric($request['max-price'])) {
                    $query->whereBetween('price', [$request['min-price'], $request['max-price']]);
                }
            } else if (isset($request['max-price']) && is_numeric($request['max-price'])) $query->whereBetween('price', [0, $request['max-price']]);
            else if (isset($request['min-price']) && is_numeric($request['min-price'])) $query->where('price', '>=', $request['min-price']);

        })->select('products.*');

        if ($request->{'order-by-price'} == 'high') $orderPrice = 'desc';
        elseif ($request->{'order-by-price'} == 'low') $orderPrice = 'asc';
        if (isset($orderPrice)) $main_items_collection->orderBy('price', $orderPrice);
        $merage = [];
        if (!$main_items_collection->count()) {
            $merage += ['max-price' => $max_price,'min-price'=>$min_price,'product-search'=>''];
        }
        if($merage) $request->merge($merage);

        $data += [
            'main_items' => $main_items_collection->paginate(4),
            'max_price' => $max_price,
            'min_price' => $min_price,
            'category' => $main_category,
            'selected_category' => $main_category,
        ];
    }
}
