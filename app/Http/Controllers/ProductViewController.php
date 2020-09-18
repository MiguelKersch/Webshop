<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Product;
use App\Http\Controllers\Controller;

class ProductViewController extends Controller
{
    public function index($id)
    {
        $product = Product::where('id', $id)->first();

        return view('productView', ['product' => $product], ['id' => $id]);
    }
}
