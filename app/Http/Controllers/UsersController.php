<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UsersController extends Controller
{
    public function profile(){
        return view('users.profile');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function search(Request $request){

        $keyword = $request->input('keyword');

        if(!empty($keyword)){
            $users = User::where('username','like','%'.$keyword.'%')->where('id','!=',Auth::id())->get();
        }else{
            $users = User::all()->where('id','!=',Auth::id());
        }

        return view('users.search',['users'=>$users,'keyword'=>$keyword]);
    }

}
