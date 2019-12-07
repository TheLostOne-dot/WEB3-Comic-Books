@extends ('master')

@section ('content')
<h1>Overview of items.</h1>
@foreach($products as $product)
    <li><a href="/full/{{$product->product_id}}">{{$product->product_name}}</a></li>
@endforeach
    @endsection
