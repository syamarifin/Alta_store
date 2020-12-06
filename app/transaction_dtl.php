<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction_dtl extends Model
{
    protected $table = 'transaction_dtl';

    protected $fillable = [
    			'id', 
    			'transaction_id', 
    			'product_id', 
    			'user_id', 
    			'product_name', 
    			'price', 
    			'qty', 
    			'created_at', 
    			'updated_at'
    		];

    public function transaksi()
    {
    	return $this->belongsTo('App\Model\transaction', 'transaction_id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Model\product', 'product_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_id');
    }
}
