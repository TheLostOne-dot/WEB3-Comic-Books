@extends('master')
@section('content')
<h1 class="title">{{$product->name}}</h1>
    <p><a href="/products/{{$product->id}}/edit">Edit</a></p>
@endsection
