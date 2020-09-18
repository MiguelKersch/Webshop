<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\OrdersProduct;
use App\Orders;
use Session;
use App\Product;
use DB;
use App\cart;
use Auth;

class OrderController extends Controller
{
    /**
     * Als user een order maakt word het opgeslagen in de database
     */
    
    public function store(){
        $user = auth()->user();
        $cart = new cart();

       
        $order = new Orders();
        $order->user_id = $user->id;
        $order->user_email = $user->email;
        $order->user_name =  $user->name;
        $order->price = $cart->totalPrice;
        $order->save();

        foreach($cart->items as $item){
          $orderProduct = new OrdersProduct;
          $orderProduct->orders_id = $order->id;
          $orderProduct->product_id = $item['item']['id'];
          $orderProduct->quantity= $item['quantity'];
          $orderProduct->price = $item['price'];
          
          $orderProduct->save();

          
        }
        Session::forget('cart');
        return redirect(route('orders'));
    }
    public function orderDetails($id){
      $order = Orders::find($id)->product;
      
      return view('orderDetails', ['orderDetails' => $order]);
    }

    /**
     * Haalt de Orders op van de user
     */
    public function index(){
      $orders = Orders::where('user_id', Auth::user()->id)->get();

      return view('order')->with([
        'orders' => $orders
      ]);
    }
}
