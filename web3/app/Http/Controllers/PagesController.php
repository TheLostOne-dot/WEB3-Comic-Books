<?php

namespace App\Http\Controllers;

use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function home(){
        return view('home');
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
    public function create(){
        if(Auth::check()) {
            abort_if(auth()->user()->admin !== 'admin', 403);
            return view('create');
        }
        else{
            return abort(403);
        }
    }
}
