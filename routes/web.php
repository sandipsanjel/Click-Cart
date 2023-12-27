<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Facade;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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


// Route::get("/register",[RegisterController::class,'index']);
// Route::post ("/register",[RegisterController::class,'register']);
Route::get('/register',[RegisterController::class,'index']);
Route::post('/register',[RegisterController::class,'register']);

// Route::get('/register','RegisterControllerController@register')->name('register');
// Route::post('/register', 'RegisterControllerController@create');
Route::post ("/login",[UserController::class,'login']);
Route::get ("/",[ProductController::class,'index']);


// Route to the detail page
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::get("search",[ProductController::class,'search']);

// To add iteam in cart
Route::post("add_to_cart",[ProductController::class,'addToCart']);
//display iteam in cart page 
Route::get("cartlist",[ProductController::class,'cartlist']);
Route::get("removecart/{id}",[ProductController::class,'removeCart']);

Route::get("ordernow",[ProductController::class,'orderNow']);
//order place in orders table DB 
Route::post("orderplace",[ProductController::class,'orderPlace']);
Route::get("myorders",[ProductController::class,'myOrders']);

//route to verify the transactions 
Route::post("khalti/verify",[ProductController::class,'verify'])->name('ajax.khalti.verfy_order');
