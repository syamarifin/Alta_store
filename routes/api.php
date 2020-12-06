<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('user/register', 'userController@register');
Route::post('user/login', 'userController@login');

//product category
Route::get('category', 'categoryController@readCategory');

//product
Route::get('product', 'productController@readProduct');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
