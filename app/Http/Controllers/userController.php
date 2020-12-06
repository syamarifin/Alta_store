<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    public function register(Request $Request){
    	$rules = [
	        'name' 		=> 'unique:users|required',
	        'email'   	=> 'unique:users|required',
	        'password' 	=> 'required',
	    ];

	    $input     = $Request->only('name', 'email','password');
	    // $validator = Validator::make($input, $rules);

	    // if ($validator->fails()) {
	    //     return response()->json(['success' => false, 'error' => $validator->messages()]);
	    // }
	    $name 		= $Request->name;
	    $email    	= $Request->email;
	    $password 	= $Request->password;
	    $user     	= User::create([
	    				'name' => $name, 
	    				'email' => $email, 
	    				'password' => Hash::make($password),
	    				'api_token'=> Str::random(60),
	    			]);
	    return new UserResource($user);

    }

    public function login(Request $Request){
    	$rules = [
	        'email'   	=> 'unique:users|required',
	        'password' 	=> 'required',
	    ];

	    $input     = $Request->only('email','password');
	    // $validator = Validator::make($input, $rules);

	    // if ($validator->fails()) {
	    //     return response()->json(['success' => false, 'error' => $validator->messages()]);
	    // }
	     if(!Auth::attempt(['email' => $Request->email, 'password' => $Request->password])) {
      		return response()->json(['error' => 'Your credential is wrong'], 401);
	    }

	    $user = Auth::user();

	    return new UserResource($user);

    }
}
