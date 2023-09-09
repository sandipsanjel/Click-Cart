<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\session;


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

Route::get('/logout', function () {
    Session::forget('user'); //to forget the users session from browser
    return redirect('login');
});

Route::post ("/login",[UserController::class,'login']);
Route::get ("/",[ProductController::class,'index']);


// Route to the detail page
Route::get("detail/{id}",[ProductController::class,'detail']);
// To add iteam in cart
Route::post("add_to_cart",[ProductController::class,'addToCart']);
//display iteam in cart page 
Route::get("cartlist",[ProductController::class,'cartlist']);






