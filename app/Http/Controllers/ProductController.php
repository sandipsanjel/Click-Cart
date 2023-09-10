<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\DB;
use App\Models\order;




class ProductController extends Controller
{
    function index()
    {
        // return Product::all() this will give json file returning product model
        // return view ('Product'); // to return the static carosel
        $data = product::all();
        return view('product', ['products' => $data]);
    }
    function detail($id)
    {

        // To retrive the specific details about  specific product based on id 
        // product is an eloquent model representing product data
        $data = product::find($id);
        return view('detail', ['product' => $data]);
    }

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
    }
    // to display the number of item in cart
    static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    // display cart item in cartlist page
    function cartlist()
    {
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->select('products.*', 'cart.id as cart_id')
            ->get();
        return view('cartlist', ['products' => $products]);
    }
    // TO remove item form cart
    function removeCart($id)
    {

        Cart::destroy($id);
        return redirect('cartlist');
    }
    // order migration 
    function orderNow()
    {

        $userId = Session::get('user')['id'];
        $total = $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');

        return view('ordernow', ['total' => $total]);
    }
    //TO put all the items that are present in cart to order DB
    function orderPlace(Request $req)
    {
        $userId = Session::get('user')['id'];
        $allcart = cart::where('user_id', $userId)->get(); //get user id info form cart to allcasrt variable 
        foreach ($allcart as $cart) 
        {
            $order = new order; //order variable will be instance of order model
            $order->product_id = $cart['product_id']; //data is geting form db 
            $order->user_id = $cart['user_id']; ///data is geting form db 
            $order->order_status = "pending";
            $order->payment_method = $req->payment; //data is geting form the form so request
            $order->payment_status = "pending"; //data from form submition 
            $order->address = $req->address;
            $order->save();
            Cart::where('user_id',$userId)->delete(); 

        }
        $req->input();
        return redirect("/");
    }
}
