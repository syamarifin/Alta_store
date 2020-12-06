<?php

namespace App\Http\Controllers;

use App\Http\Resources\Cart as CartResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\cart;

class cartController extends Controller
{
    public function readCart()
    {
        $cart = cart::where([
        	['user_cart','=',Auth::user()->id]
        ])->get();

        return CartResource::collection($cart);
    }

    public function storeCart(Request $Request)
    {
        $rules = [
	        'product_cart'	=> 'required',
	        'qty_cart' 		=> 'required',
	    ];

	    $input    		= $Request->only('product_cart','qty_cart');
	    $product_cart	= $Request->product_cart;
	    $user_cart    	= Auth::user()->id;
	    $qty_cart 		= $Request->qty_cart;
	    $cart     		= cart::create([
	    				'product_cart' 	=> $product_cart, 
	    				'user_cart' 	=> $user_cart, 
	    				'qty_cart' 		=> $qty_cart,
	    			]);

        return new CartResource($cart);
    }

    public function updateCart(Request $Request)
    {
        $rules = [
	        'qty_cart' 		=> 'required',
	    ];

	    $input    			= $Request->only('qty_cart');
	    $id_cart			= $Request->id_cart;
	    $qty_cart 			= $Request->qty_cart;
	    $cart = DB::table('cart')
              ->where('id', $id_cart)
              ->update(['qty_cart' => $qty_cart]);

        $cartList = cart::where([
        	['id','=',$id_cart]
        ])->get();
        return $cartList;
    }

    public function deleteCart($id_cart){
    	$cart = cart::findOrFail($id_cart);
        $cart->delete();
        return response()->json(json_decode('{"message" : "deleted succes" }'), 200);
    }
}
