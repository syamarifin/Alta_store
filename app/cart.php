<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
    			'id', 
    			'product_cart', 
    			'user_cart', 
    			'qty_cart', 
    			'created_at', 
    			'updated_at'
    		];

    public function product()
    {
    	return $this->belongsTo('App\Model\transaction', 'product_cart');
    }

    public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_cart');
    }
}
