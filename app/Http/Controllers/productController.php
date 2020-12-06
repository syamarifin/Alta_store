<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product as ProductResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\product;

class productController extends Controller
{
    public function readProduct(Request $Request)
    {
        $product = product::get();
        if ($Request->category!='') {
        	$product = product::where([
        		['category_product','=',$Request->category]
        	])
        	->get();
        }

        return ProductResource::collection($product);
    }
}
