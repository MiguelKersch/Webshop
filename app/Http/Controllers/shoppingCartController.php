<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\cart;
use App\Http\Controllers\Controller;

class ShoppingCartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Session::has('cart')) {
            return view('shoppingCart', ['products' => null]);
        }
        $cart = new cart();
        return view('shoppingCart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    public function removeItem(Request $request, $id)
    {
        $cart = new cart();
        $cart->removeProduct($id);

        return redirect()->back();
    }
}
