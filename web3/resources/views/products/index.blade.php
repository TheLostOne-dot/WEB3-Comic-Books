@extends('master')
    @section('content')
<!DOCTYPE html>

<html>

<head>

    <title></title>
</head>

<body>
    <h1>Products</h1>

    <button type="submit" class="btn btn-primary">
        <a href="products/create" class="button">Create New Product</a>
    </button>

    @foreach($products as $product)
        <li><a href="products/{{$product->id}}">{{$product->id}} {{$product->name}}</a></li>
        <img src="{{Storage::disk('s3')->url('products/'.$product->id.'/product'.'/thumbnail')}}">
    @endforeach

</body>

</html>
@endsection
