<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Cart;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
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
    /**
     * Laat de product pagina zien met de data die nodig is
     *
     * @param int $id
     * @return void
     */
    public function index($id)
    {
        $categoryName = DB::table('category')->where('id', $id)->first();
        $product = DB::table('product')->get()->where('category_id', $id);

        return view('product', ['products' => $product], ['category' => $categoryName]);
    }

    /**
     * Zorg ervoor dat je een product kan toevoegen aan de shoppingcart
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function getAddToCart(Request $request , $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
        
    }
}
