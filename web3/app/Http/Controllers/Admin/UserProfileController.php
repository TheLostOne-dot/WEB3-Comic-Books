<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Products;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        abort_if(auth()->user()->admin !=='admin',403);
        $users=User::all();
        if(request()->view) {
            return new UserResource($users);
        }
        else{
            return view('profile.index',compact('users'));
        }

    }

    public function show($id)
    {
        $user=User::find($id);
        if(request()->view) {
            return view('profile.show',compact('user'));
        }
        else{
            return new UserResource($user);
        }
    }

    public function update($id,Request $request)
    {
        if($request->has('avatar')){

            $avatar = $request->file('avatar');
            $extension = $request->file('avatar')->getClientOriginalExtension();


            $filename='avatar';
            $ui=auth()->id();

            $mask=Storage::disk('s3')->get('/public/mask.png');
            //Resize

            $normal = Image::make($avatar)->resize(250 , 250)->mask($mask,true)->encode($extension);

            //Make image in to a circle

            //$normal=Image::make($avatar)->mask('storage/app/masks/mask');


            //Store on S3
            Storage::disk('s3')->put('/avatars/'."{$ui}".'/'."{$filename}", (string)$normal, 'public');


            $user = User::findorFail(Auth::user()->id);
            $user->avatar = $filename;
            //$user->save();
            //return dd($avatar);
            return redirect()->back();
        }
        $user=User::findOrFail($id);
        if (Auth::user()->email == request('email')) {

            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);


            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();
            if(request()->view) {
                return back();
            }
            else{
                return new UserResource($user);
            }

        }
        else {

            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);


            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();
        }

    }
    public function destroy($id)
    {
        abort_if(auth()->user()->admin !=='admin',403);
        $user=User::find($id);
        $user->delete();
        return redirect('/profile');
    }
}
