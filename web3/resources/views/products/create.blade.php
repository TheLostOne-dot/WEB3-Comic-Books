@extends('master')
@section('content')
<h1>Create new Product</h1>


<form method="POST" action="/products">
    {{csrf_field()}}
    <div>
        <input type="text" name="name" placeholder="Product name" required>
    </div>

    <div>
        <input type="text" name="volume" placeholder="Product volume" required>
    </div>

    <div>
        <input type="text" name="issue" placeholder="Product issue" required>
    </div>

    <div>
        <input type="text" name="price" placeholder="Product price" required>
    </div>

    <div>
        <input type="text" name="stock" placeholder="Product stock" required>
    </div>

    <div>
        <button type="submit">Create Product</button>
    </div>

    @if($errors->any())
    <div class="notification is-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</form>
@endsection
