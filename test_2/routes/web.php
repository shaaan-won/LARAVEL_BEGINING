<?php

use App\Http\Controllers\customer\customerController;
use App\Http\Controllers\testController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/{id}/{name}', function ($id, $name) {
    return view('test1',compact('id','name'));
});

Route::get('/test2/{id}/{name}',[testController::class,'index']);


//customer route

// Route::get('/customer', function () {
//     return view('customer.index');
// });

Route::get('/customer', [customerController::class, 'index']);

Route::get('/customer/create', [customerController::class, 'create']);

Route::post('/customer/store', [customerController::class, 'store']);

// Route::redirect("/customer/store","/customer");

