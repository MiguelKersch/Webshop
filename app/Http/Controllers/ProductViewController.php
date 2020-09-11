<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductViewController extends Controller
{
    public function index($id)
    {
        $product = DB::table('product')->where('id', $id)->first();

        return view('productView', ['product' => $product]);
    }
}
