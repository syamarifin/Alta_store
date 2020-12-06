<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';

    protected $fillable = [
    			'id', 
    			'name_product', 
    			'category_product', 
    			'price', 
    			'created_at', 
    			'updated_at'
    		];

    public function product()
    {
    	return $this->belongsTo('App\Model\category_product', 'category_product');
    }

    public function cart()
    {
    	return $this->hasMany('App\Model\cart', 'id');
    }

    public function transaction_dtl()
    {
    	return $this->hasMany('App\Model\transaction_dtl', 'id');
    }
}
