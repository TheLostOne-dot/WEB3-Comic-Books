<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class OverviewController extends Controller
{
    //
    public function index(){
        $products=Product::all();

        return view('overview.overview',compact('products'));
    }

    public function all(Product $product){

        return view('overview.full',['product'=>$product]);
    }
}
