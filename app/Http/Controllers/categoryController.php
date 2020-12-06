<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category as CategoryResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\category_product;

class categoryController extends Controller
{
    public function readCategory()
    {
        $category = category_product::get();

        return CategoryResource::collection($category);
    }
}
