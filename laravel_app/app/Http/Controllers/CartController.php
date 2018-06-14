<?php

namespace App\Http\Controllers;

use App\OrderList;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class CartController extends MainController
{

    public function index()
    {
        self::setTitle('Cart');
        return view('main-pages.cart',self::$data+['shopCartPage'=>true]);
    }
    public function storeOrderList(Request $request){
        $order = json_decode($request->order);

        if(count($order)){
            $order = collect($order)->map(function ($item){
                $product = Product::from('products as p')->where('p.id',$item->id)->join('categories as c','p.category_id','=','c.id')->select('p.title','p.price','p.main_img','p.url','c.url as c_url')->first();
                if(isset($product->id)) {
                    $product->quantity -= $item->quantity;
                    $product->save();
                }
                return ['item'=>$product,'quantity'=>$item->quantity];
            })->filter(function ($order){
                return $order['item'];
            })->toJson();
            if($orderList = auth()->user()->orders()->save(new OrderList(['list'=>$order,'step'=>1]))){
                $orderData = ['order_id',$orderList->id,'step'=>1];
                if(!Session::has('userOrders')) Session::put('userOrders',[$orderData]);
                else {
                    Session::push('userOrders',$orderData);
                }
                Session::flash('clear_cart',1);
                return redirect('cart');
            }
        }
        return redirect('cart');
    }
}
