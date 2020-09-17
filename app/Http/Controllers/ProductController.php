<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Laat de product pagina zien met de data die nodig is
     *
     * @param int $id
     * @return void
     */
    public function index($id)
    {
        $categoryName = Category::where('id', $id)->first();
        $product = Category::find($id);

        return view('product', ['product' => $product], ['category' => $categoryName]);
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
