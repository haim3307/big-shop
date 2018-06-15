<?php

namespace App;

class OrderList extends MainModel
{
    protected $table = 'order_lists';
    protected $fillable = ['list'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    static public function getAllOrdersPaginate(&$page,$userId = null)
    {

        if($userId) $page = self::where('user_id',$userId);
        $page = !empty($page)?$page->paginate(3):self::paginate(3);
        $page->getCollection()->transform(function ($order){
            $order->list = collect(json_decode($order['list']));
            $order->subTotal = $order->list->sum(function ($listItem){
                return $listItem->item->price * $listItem->quantity;
            });
            $order->total = $order->subTotal + ($order->subTotal * 0.18) ;
            $order->totalQuantity = $order->list->sum(function ($listItem){
                return $listItem->quantity;
            });
            return $order;
        });

    }
}
