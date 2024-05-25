<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;

class UsersController extends Controller
{
    public function profile($id){
            $users = User::where('id',$id)->first();
            $posts = Post::where('user_id',$id)->latest()->get();
            // return view('users.profile',['users'=>$users]);
            return view('users.profile',compact('users'),compact('posts'));
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
