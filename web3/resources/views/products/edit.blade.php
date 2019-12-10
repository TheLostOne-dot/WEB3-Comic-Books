@extends('master')
@section('content')
    <h1 class="title">Edit product</h1>
   <form method="POST" action="/products/{{$product->id}}" style="margin-bottom: 1em">

       {{method_field('PATCH')}}
       {{csrf_field()}}


       <div class="field">
           <label class="label" for="title">Title</label>
           <div class="control">
               <input type="text" class="input" name="title" placeholder="Title" value="{{$product->name}}">
           </div>
       </div>

       <div class="field">
           <label class="label" for="volume">Volume</label>
           <div class="control">
               <textarea name="volume" class="textarea">{{$product->volume}}</textarea>
           </div>
       </div>

       <div class="field">
           <label class="label" for="">Issue</label>
           <div class="control">
               <textarea name="issue" class="textarea">{{$product->issue}}</textarea>
           </div>
       </div>

       <div class="field">
           <label class="label" for="">Price</label>
           <div class="control">
               <textarea name="price" class="textarea">{{$product->price}}</textarea>
           </div>
       </div>

       <div class="field">
           <label class="label" for="">Stock</label>
           <div class="control">
               <textarea name="stock" class="textarea">{{$product->stock}}</textarea>
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
