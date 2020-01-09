@extends ('master')

@section ('content')

    <form method="post" action="{{route('profile',$user)}}">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="field">
            <label class="label" for="">Change Username:</label>
            <div class="control">
                <input type="text" name="name"  value="{{ $user->name }}" />
            </div>
        </div>

        <div class="field">
            <label class="label" for="">Change Email:</label>
            <div class="control">
                <input type="email" name="email"  value="{{ $user->email }}" />
            </div>
        </div>

        <div class="field">
            <label class="label" for="">Change Password:</label>
            <div class="control">
                <input type="password" name="password" >
            </div>
        </div>

        <div class="field">
            <label class="label" for="">Confirm Password:</label>
            <div class="control">
                <input type="password" name="password_confirmation" >
            </div>
        </div>

        <button type="submit">Change</button>
    </form>

    <img src="{{Storage::disk('s3')->url('avatars/'.auth()->id().'/avatar')}}">

    <form method="post" action="/avatars" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="field">
    <input type="file" name="avatar" >
        </div>
        <div>
    <button type="submit">Upload/Change Avatar</button>
        </div>

    </form>
@endsection
