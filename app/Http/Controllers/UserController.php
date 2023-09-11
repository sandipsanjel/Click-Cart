<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    //to authenticate the user 
    //reques method represents the http request
    // $req/$request contains info abt http methos such as GET POST input data ,headers 
    function login(Request $req)
    {
        //$user obj that retrives the data from database 
        //to display the login details in screen
    //    return  User::where(['email' => $req->email])->first();//laravel Eloquent ORM 
    $user =User::where(['email'=>$req->email])->first();
        //hash check is done for the authentication and here hash fucn check the req pass and real pass that is stored in database 
        if (!$user || !Hash::check($req->password, $user->password)) {
            return "username or password is not matched";
        } else {
          //storing authenticated users information in session
          //sessions maintains the specific info across the http requests 
            //helps keep track of the users session and identify them
            $req->session()->put('user', $user);
            //redirect to the usres root url
            return redirect('/');
        }
    }
        function register(Request $req){
// return $req->input();
$user=new User;
$user->email=$req->email;
$user->name=$req->name;
$user->password=hash::make($req->password);
$user->save();
return redirect('/login');
        
    }
}
