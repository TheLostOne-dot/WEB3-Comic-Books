@extends ('master')

@section ('content')
    <h1>All the content.</h1>
    <ul>
        <li><a>Product ID:{{$product->product_id}}</a></li>
        <li><a>Product Name:{{$product->product_name}}</a></li>
        <li><a>Product price:{{$product->price}}</a></li>
        <li><a>Amount in stock:{{$product->stock}}</a></li>
        <li><a>Added:{{$product->created_at}}</a></li>
        <li><a>Updated:{{$product->updated_at}}</a></li>
    </ul>
@endsection
