<?php

namespace App\Http\Controllers;

use App\Libraries\Repositories\Basket\BasketRep;
use App\Libraries\Repositories\Order\OrderRepository;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Category;
use App\Models\Feed;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function news(){
        return view('news');
    }

    public function oneNews($id){
        $news = Feed::where('id', $id)->get();
        return view('one_news', compact('news'));
    }

    public function category(){
        $categories = Category::get();
        return view('category', compact('categories'));
    }

    public function catalog($code){
        $products = Product::where('category', Category::where('code',$code)->first()->id)->get();
        return view('catalog', compact('products'));
    }

    public function product($category ,$code){
        Product::where('category', Category::where('code',$category)->first()->id)->get();
        $products = Product::where('code', $code)->get();
        return view('product', compact('products'));
    }

    public function company(){
        return view('company');
    }

    public function about(){
        return view('about');
    }

    public function profile(){
        $user = auth()->user();
        $orders = OrderRepository::getOrderByUser($user->id);
        return view('profile', compact('user', 'orders'));
    }

    public function basket(){
        $user_id = auth()->user()->id;
        $basket_confirm = BasketRep::getBasketByUser($user_id);
        if (is_null($basket_confirm)){
            Basket::create([
                'user_id' => $user_id,
            ]);
        }
        $basket_id = Basket::where('user_id', $user_id)->first()->id;
        $basketProducts = BasketProduct::where('basket_id', $basket_id)->get();
        return view('basket', compact('basketProducts', 'basket_id'));
    }
}
