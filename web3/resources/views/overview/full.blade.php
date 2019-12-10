@extends ('master')

@section ('content')
    <h1>All the content.</h1>
    <ul>
        <li><a>Product ID:{{$product->id}}</a></li>
        <li><a>Product Name:{{$product->name}} vol {{$product->volume}} issue #{{$product->issue}}</a></li>
        <li><a>Product price:{{$product->price}}</a></li>
        <li><a>Amount in stock:{{$product->stock}}</a></li>
        <li><a>Added:{{$product->created_at}}</a></li>
        <li><a>Updated:{{$product->updated_at}}</a></li>
    </ul>
@endsection
