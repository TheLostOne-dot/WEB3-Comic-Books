@extends('master')
    @section('content')
<!DOCTYPE html>

<html>

<head>

    <title></title>
</head>

<body>
    <h1>Products</h1>


    @foreach($products as $product)
        <li><a href="products/{{$product->id}}">{{$product->id}} {{$product->name}}</a></li>
    @endforeach

</body>

</html>
@endsection
