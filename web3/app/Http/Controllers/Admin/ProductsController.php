<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Products;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class ProductsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():Products
    {
        $products=Product::all();
        if(request()->view) {
            return view('products.index', compact('products'));
        }
        else{
            return new Products($products);
        }
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
    public function store():Products
    {
        $info=request()->validate([
            'name'=> 'required',
            'volume'=> 'required',
            'issue'=> 'required',
            'price'=> 'required',
            'stock'=> 'required'
        ]);
        Product::create($info);

        if(request()->view) {
            return redirect('/products');
        }
        else{
            return new Products($info);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product):Products
    {
//        $this->authorize('view',$product);
        if(request()->view) {
            return view('products.show',compact('product'));
        }
        else{
            return new Products($product);
        }

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
            $watermark=Storage::disk('s3')->get('/public/WaterMark.png');

            $filename = 'product';
            $normal = Image::make($pic)->resize(250, 250)->insert($watermark)->encode($extension);
            $pixelated = Image::make($pic)->resize(250, 250)->pixelate(20)->encode($extension);
            $thumbnail=Image::make($pic)->resize(100,150)->encode($extension);

            Storage::disk('s3')->put('/products/'."$product->id".'/'."{$filename}".'/original', (string)$normal, 'public');
            Storage::disk('s3')->put('/products/'."$product->id".'/'."{$filename}".'/pixelated', (string)$pixelated, 'public');
            Storage::disk('s3')->put('/products/'."$product->id".'/'."{$filename}".'/thumbnail',(string)$thumbnail,'public');

            $product = Product::findorFail("$product->id");
            $product->pic = $filename;
        }
        if(request()->view){
            return redirect()->back();
        }
        else{
            return new Products($product);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product):Products
    {
        $product->delete();
        if(request()->view) {
            return redirect('/products');
        }
        else {
            return new Products($product);
        }

    }


}
