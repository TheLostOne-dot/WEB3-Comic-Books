<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class UserController extends Controller
{
    public function index(){
        if(Auth::check()) {
            abort_if(auth()->user()->admin !== 'admin', 403);
//        $users=User::all();
//            return view('customers',compact('users'));
            $user_data = DB::table('users')->get();
            return view('users')->with('user_data', $user_data);
        }
        else{
            return abort(403);
        }

    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
