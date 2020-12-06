<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_product extends Model
{
    protected $table = 'product_category';

    protected $fillable = [
    			'id', 
    			'name_category', 
    			'created_at', 
    			'updated_at'
    		];

    public function product()
    {
    	return $this->hasMany('App\Model\product', 'id');
    }
}
