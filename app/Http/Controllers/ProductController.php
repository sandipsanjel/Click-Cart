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
    function detail($id)
    {

        // To retrive the specific details about  specific product based on id 
        // product is an eloquent model representing product data
        $data=product::find($id);
        return view ('detail',['product'=>$data]);
    }
}
