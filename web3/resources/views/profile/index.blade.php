@extends('master')
@section('content')
        <!DOCTYPE html>

<html>

<head>

    <title></title>
</head>

<body>
<h1>Products</h1>


@foreach($users as $user)
    <li><a href="profile/{{$user->id}}">{{$user->id}} {{$user->name}}</a></li>
@endforeach

</body>

</html>
@endsection