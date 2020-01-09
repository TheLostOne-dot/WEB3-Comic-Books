@extends('master')
@section('content')
    <h1 class="title">Edit product</h1>
   <form method="POST" action="/products/{{$product->id}}" style="margin-bottom: 1em">

       {{method_field('PATCH')}}
       {{csrf_field()}}


       <div class="field">
           <label class="label" for="title">Title</label>
           <div class="control">
               <input type="text" class="input" name="title" placeholder="Title" value="{{$product->name}}" required>
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
   </form>

    <form method="POST" action="/products/{{$product->id}}">
        {{method_field('DELETE')}}
        {{csrf_field()}}
        <div class="field">

            <div class="control">
                <button type="submit" class="button">Delete Product</button>
            </div>
        </div>
    </form>
@endsection
