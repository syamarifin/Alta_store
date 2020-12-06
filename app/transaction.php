<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table = 'transaction';

    protected $fillable = [
    			'id', 
    			'user_id', 
    			'paid', 
    			'created_at', 
    			'updated_at'
    		];

    public function transaksiDtl()
    {
    	return $this->hasMany('App\Model\transaction_dtl', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_id');
    }
}
