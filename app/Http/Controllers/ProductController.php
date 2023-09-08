<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;
// use Illuminate\Support\Facades\Session;


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
// function addTocart(request $req){
//     if($req->session()->has('user'))
//     {
//        $cart= new cart;
//        $cart->user_id=$req->session()->get('user')['id'];
//        $cart->product_id=$req->product_id;
//        $cart->save();
//        return redirect('/');
// }
// else return redirect('/login');
// }
// }
function addTocart(Request $req)
{
    if ($req->session()->has('user')) {
        $cart = new Cart;
        $cart->user_id = $req->session()->get('user')['id'];
        $cart->product_id = $req->product_id;
        $cart->save();
       return redirect('/');
    } else {
        return redirect('/login');
    }
 
}}






