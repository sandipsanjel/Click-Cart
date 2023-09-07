<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index()
    {
        // return Product::all() this will give json file returning product model
        // return view ('Product'); // to return the static carosel
        $data =product::all();
        return view ('product',['products'=>$data]);
    }
}
