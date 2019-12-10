@extends ('master')

@section ('content')
<h1>Overview of items.</h1>
@foreach($products as $product)
    <li><a href="/full/{{$product->id}}">{{$product->name}}</a></li>
@endforeach
    @endsection
