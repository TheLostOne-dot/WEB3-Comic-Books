@extends('master')
    @section('content')
<!DOCTYPE html>

<html>

<head>

    <title></title>
</head>

<body>
    <h1>Products</h1>
    @if(Auth::check())
        @if(auth()->user()->admin =='admin')
    <button type="submit" class="btn btn-primary">
        <a href="/create" class="button">Create New Product</a>
    </button>
            @else
            @endif
        @else
        @endif

    @foreach($products as $product)
        <li><a href="products/{{$product->id}}">{{$product->id}} {{$product->name}}</a></li>
    @endforeach

</body>

</html>
@endsection
