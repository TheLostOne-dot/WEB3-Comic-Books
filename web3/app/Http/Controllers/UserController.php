<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class UserController extends Controller
{
    public function index(){
//        $users=User::all();
//            return view('customers',compact('users'));
        $user_data=DB::table('users')->get();
        return view('users')->with('user_data',$user_data);

    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
