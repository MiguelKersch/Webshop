<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $category = DB::select('select * from category');
        return view('category', ['categorys' => $category]);
    }
}
