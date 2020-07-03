<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Orders;
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
      Orders::create([
          'user_id' => $user->id,
          'user_email' => $user->email,
          'user_name' => $user->name,
          'price' => $cart->totalPrice
      ]);
        return redirect(route('orders'));
    }

    /**
     * Haalt de user data op
     */
    public function index(){
      $orders = Orders::where('user_id', Auth::user()->id)->get();

      return view('order')->with([
        'orders' => $orders
      ]);
    }
}
