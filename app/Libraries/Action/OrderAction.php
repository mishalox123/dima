<?php

namespace App\Libraries\Action;

use App\Libraries\Repositories\Basket\BasketRep;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class OrderAction
{
    public function __construct(private array $address){}

    public function heandle(): string
    {
        $user_id = auth()->user()->id;
        $basket = BasketRep::getBasketByUser($user_id)->id;
        Order::create([
            'user_id' => $user_id,
            'basket_id' => $basket,
            'address' => $this->address['region'] . $this->address['city'] . $this->address['street'] . $this->address['home'],
            'comment' => $this->address['comment'],
            'status' => 0,
        ]);

        $products = BasketProduct::where('basket_id', $basket)->get();
        $orders_id = Order::where('user_id', $user_id)->where('basket_id', $basket)->first()->id;
        foreach ($products as $product){
            OrderProduct::create([
                'order_id' =>$orders_id,
                'product_id' =>$product->product_id,
                'count' =>$product->count
        ]);
        }

        BasketProduct::where('basket_id', $basket)->delete();
        return json_encode(true);
    }
}
