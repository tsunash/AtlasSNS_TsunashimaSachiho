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


    public function profileEdit(Request $request){

        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $images = $request->file('images');



        $request->validate([
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|min:5|max:40|email|unique:users,mail,'.$id.'id',
            'password' => 'required|min:8|max:20|regex:/^[a-zA-Z0-9]+$/|confirmed',
            'bio' => 'max:150|string',
            'images' => 'mimes:jpg,png,bmp,gif,svg'
        ]);

        User::where('id',$id)->update([
            'username' => $username,
            'mail' => $mail,
            'password' => bcrypt($password),
            'bio' => $bio,
        ]);

        if(isset($images)){
            $image_name = $images->getClientOriginalName();
            $request->file('images')->storeAs('public',$image_name);
            User::where('id',$id)->update([
                'images' => $image_name
            ]);
        };


        return redirect('/top');



    }

}
