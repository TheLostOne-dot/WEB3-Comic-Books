@extends('master')
@section('content')
    <h1 class="title">Edit product</h1>
    @if(Auth::check())
        @if(auth()->user()->admin =='admin')
    <form method="POST" action="/products/{{$product->id}}" style="margin-bottom: 1em">

        {{method_field('PATCH')}}
        {{csrf_field()}}


        <div class="field">
            <label class="label" for="name">Title</label>
            <div class="control">
                <input type="text" class="input" name="name" placeholder="Title" value="{{$product->name}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="volume">Volume</label>
            <div class="control">
                <input type="text" class="input" name="volume" placeholder="Volume" value="{{$product->volume}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="">Issue</label>
            <div class="control">
                <input type="text" class="input" name="issue" placeholder="Issue" value="{{$product->issue}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="">Price</label>
            <div class="control">
                <input type="text" class="input" name="price" placeholder="Price" value="{{$product->price}}" required>
            </div>
        </div>

        <div class="field">
            <label class="label" for="">Stock</label>
            <div class="control">
                <input type="text" class="input" name="stock" placeholder="Stock" value="{{$product->stock}}" required>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>
        @else
            <ul>
                <li><p>{{$product->name}}</p></li>
                <li><p>Vol.{{$product->volume}}</p></li>
                <li><p>Issue #{{$product->issue}}</p></li>
                <li><p>Price: &euro;{{$product->price}}</p></li>
                <li><p>In stock: {{$product->stock}}</p></li>
            </ul>
        @endif
        @else
            <ul>
                <li><p>{{$product->name}}</p></li>
                <li><p>Vol.{{$product->volume}}</p></li>
                <li><p>Issue #{{$product->issue}}</p></li>
                <li><p>Price: &euro;{{$product->price}}</p></li>
                <li><p>In stock: {{$product->stock}}</p></li>
            </ul>
        @endif
    </form>

    <img src="{{Storage::disk('s3')->url('products/'.$product->id.'/product/original')}}" onmouseover="hover(this);" onmouseout="unhover(this);">
    @if(Auth::check())
        @if(auth()->user()->admin =='admin')
    <form method="POST" action="/products/{{$product->id}}"  enctype="multipart/form-data">
        {{method_field('PATCH')}}
        {{ csrf_field() }}

        <div class="field">
            <input type="file" name="pic" >
        </div>
        <div>
            <button type="submit">Upload/Change Avatar</button>
        </div>

    </form>
        @else
        @endif
    @else
    @endif
    @if(Auth::check())
        @if(auth()->user()->admin =='admin')
    <form method="POST" action="/products/{{$product->id}}">
        {{method_field('DELETE')}}
        {{csrf_field()}}
        <div class="field">

            <div class="control">
                <button type="submit" class="button">Delete Product</button>
            </div>
        </div>
    </form>
        @else
        @endif
    @else
    @endif
    <script>
        function hover(element) {
            element.setAttribute('src', "{{Storage::disk('s3')->url('products/'.$product->id.'/product/pixelated')}}");
        }

        function unhover(element) {
            element.setAttribute('src', "{{Storage::disk('s3')->url('products/'.$product->id.'/product/original')}}");
        }
    </script>
@endsection
