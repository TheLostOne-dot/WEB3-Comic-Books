<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Intervention\Image\Facades\Image as Image;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update($id)
    {
        $user=User::findOrFail($id);
        if (Auth::user()->email == request('email')) {

            $this->validate(request(), [
                'name' => 'required',
//                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);


            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();

        }
        else {

            $this->validate(request(), [
                'name' => 'required',
//                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);


            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();
        }
    }
    public function store(Request $request)
    {
        if($request->has('avatar')){

            $avatar = $request->file('avatar');
            $extension = $request->file('avatar')->getClientOriginalExtension();

            $filename='avatar';
            $ui=auth()->id();
            $normal = Image::make($avatar)->resize(250 , 250)->encode($extension);


            Storage::disk('s3')->put('/avatars/'."{$ui}".'/'."{$filename}", (string)$normal, 'public');

            
            $user = User::findorFail(Auth::user()->id);
            $user->avatar = $filename;
//            $user->save();

            return redirect()->back();
        }
    }

}
