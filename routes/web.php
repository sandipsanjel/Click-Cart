<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('login');
});

Route::post ("/login",[UserController::class,'login']);
// Route::get ("/",[ProductController::class,'index']);




// // to handle user logout anf redirect them to the login page 
// Route::get('/logout',function(){//users accesses the logout URL via GET req
//     Session::forget('user');//to remove the the users inforamtion form session
//     return redirect ('login');//after removing users data it redirects to the login page 
// });