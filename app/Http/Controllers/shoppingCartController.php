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

    public function index()
    {
        if (!Session::has('cart')) {
            return view('shoppingCart', ['products' => null]);
        }
        $cart = new cart();

        return view('shoppingCart', ['cartDetails' => $cart]);
    }
    public function removeItem(Request $request, $id)
    {
        $cart = new cart();
        $cart->removeProduct($id);

        return redirect()->back();
    }
    public function update(Request $request, $id){
            $cart = new Cart();
            $cart->updateQuantity($request, $id, $request->input("quantityInput"));

            return redirect()->back();
        }
}
