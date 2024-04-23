<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function profile(){
        return view('users.profile');
    }

    public function search(){
        return view('users.search');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}
