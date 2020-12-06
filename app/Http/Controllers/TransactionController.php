<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Transaction as TransactionResource;
use App\transaction;
use App\transaction_dtl;
use App\cart;
use App\product;

class TransactionController extends Controller
{
	public function readCheckout(Request $Request){
		$checkout = transaction::where([
        	['user_id','=',Auth::user()->id],
        	['paid','=',0]
        ])->get();

        return TransactionResource::collection($checkout);
	}
    public function storeCheckout(Request $Request){
    	$data_cart = json_decode($Request->getContent(), true);
    	$trans = transaction::create([
	    	'user_id' 	=> Auth::user()->id, 
	    	'paid' 			=> 0, 
	    ]);
	    foreach ($data_cart['data'] as $value) {
	    	$cart = cart::join('product', 'product.id', '=', 'cart.product_cart')
            ->select(['cart.product_cart', 'product.name_product','product.price', 'cart.qty_cart'])
            	->where('cart.user_cart', Auth::user()->id)
                ->where('cart.id', $value['id'])
                ->first();
            $transactiondetail = transaction_dtl::create([
                'transaction_id'    => $trans->id,
                'product_id'        => $cart->product_cart,
                'user_id'           => Auth::user()->id,
                'product_name'      => $cart->name_product,
                'price'             => $cart->price,
                'qty'               => $cart->qty_cart,
            ]);
            $cart = cart::findOrFail($value['id']);
            $cart->delete();
	    }
	    return new TransactionResource($trans);
    }

    public function storePaid(Request $Request)
	{
		$paid = DB::table('transaction')
              ->where('id', $Request->id_trans)
              ->update(['paid' => 1]);

		$paidTrue = transaction::where([
        	['user_id','=',Auth::user()->id],
        	['paid','=',1]
        ])->get();

		return new TransactionResource($paidTrue);
    }
    
    public function readPaid(Request $request)
    {
        $paidTrue = transaction::where([
        	['user_id','=',Auth::user()->id],
        	['paid','=',1]
        ])->get();

        return TransactionResource::collection($paidTrue);
    }
}
