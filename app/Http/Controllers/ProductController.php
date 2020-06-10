<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index($id)
    {
        $categoryName = DB::table('category')->where('id', $id)->first();
        $product = DB::table('product')->get()->where('category_id', $id);

        return view('product', ['products' => $product] , ['category' => $categoryName]);
    }
}
