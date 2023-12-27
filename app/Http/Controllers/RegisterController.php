<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }


    public function register(Request $req)
    {
        // $req->validate(
        //     [
        //         'name'=>'required',
        //         'email'=>'required|email',
        //         'password'=>'required|confirmed',
        //     ]
        //     );
            
            
     
        // Validation passed; create and save the user
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
    
        return redirect('/login');
    }
    
}
