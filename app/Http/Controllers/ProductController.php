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
        foreach ($allcart as $cart) {
            $order = new Order; //order variable will be instance of order model
            $order->product_id = $cart['product_id']; //data is geting form db 
            $order->user_id = $cart['user_id']; ///data is geting form db 
            $order->order_status = "pending";
            $order->payment_method = $req->payment; //data is geting form the form so request
            $order->payment_status = "pending"; //data from form submition 
            $order->address = $req->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        $req->input();
        return redirect("/myorders");
    }

    //search method takes a user's search query from the request, searches for products whose names contain that query, and returns the matching products as a collection in the $data variable. 
    function search(Request $req)
    {
        $data = product::where('name', 'like', '%' . $req->input('query') . '%')
            ->get();
        return view('search', ['products' => $data]);
    }
    function myOrders()
    {
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();
        return view('myorders', ['orders' => $orders]);
    }


    public function verify(Request $req)
    {
        $args = http_build_query(array(
            'token' => $req->token, //to verify we need to components token and amount 
            'amount'  => 1000 //rtn we are sending exactly 1000 pisos otherwise we use db
        ));
        //requesting to verify the trasaction using curl 
        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = ['Authorization: Key test_secret_key_88a83688c0e041bab614c6b2b2ec5d46'];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $error = curl_error($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($error) {
            // Handle cURL error
            return response()->json(['error' => 1, 'message' => 'cURL error: ' . $error]);
        } elseif ($status_code == 200) {
            return response()->json(['success' => 1, 'redirecto' => route('ordernow')]);
        } else {
            return response()->json(['error' => 1, 'message' => 'Payment failed']);
        }
    }
}
