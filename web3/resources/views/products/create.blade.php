@extends('master')
@section('content')
<!DOCTYPE html>

<html>

<head>

    <title></title>
</head>

<body>
<h1>Create new Product</h1>


<form method="POST" action="/products">
    {{csrf_field()}}
    <div>
        <input type="text" name="name" placeholder="Product name">
    </div>

    <div>
        <textarea name="volume" placeholder="Product volume"></textarea>
    </div>

    <div>
        <textarea name="issue" placeholder="Product issue"></textarea>
    </div>

    <div>
        <textarea name="price" placeholder="Product price"></textarea>
    </div>

    <div>
        <textarea name="stock" placeholder="Product stock"></textarea>
    </div>

    <div>
        <button type="submit">Create Product</button>
    </div>
</form>
</body>

</html>
@endsection
