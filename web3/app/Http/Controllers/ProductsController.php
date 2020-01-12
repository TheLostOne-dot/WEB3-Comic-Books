<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //abort_if(auth()->user()->admin !==1,403);
        $products=Product::all();


        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $info=request()->validate([
            'name'=> 'required',
            'volume'=> 'required',
            'issue'=> 'required',
            'price'=> 'required',
            'stock'=> 'required'
        ]);
        Product::create($info);


        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $this->authorize('view',$product);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $this->authorize('view',$product);
        return view('products.edit',compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product,Request $request)
    {
        $product->update(request(['name','volume','issue','price','stock']));
        if($request->has('pic')) {

            $pic = $request->file('pic');
            $extension = $request->file('pic')->getClientOriginalExtension();

            $filename = 'product';
            $normal = Image::make($pic)->resize(250, 250)->encode($extension);
            $pixelated = Image::make($pic)->resize(250, 250)->pixelate(20)->encode($extension);


            Storage::disk('s3')->put('/products/'."$product->id".'/'."{$filename}".'/original', (string)$normal, 'public');
            Storage::disk('s3')->put('/products/'."$product->id".'/'."{$filename}".'/pixelated', (string)$pixelated, 'public');


            $product = Product::findorFail("$product->id");
            $product->pic = $filename;
            return redirect()->back();
        }
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }

}
