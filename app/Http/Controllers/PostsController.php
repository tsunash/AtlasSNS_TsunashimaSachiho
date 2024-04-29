<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    public function index(){
        return view('posts.index');
    }

    public function postCreate(Request $request){

        $request->validate([
            'post' => 'required|min:1|max:150',
        ]);

        $user_id=Auth::user()->id;
        $post = $request->input('post');

        Post::create([
            'user_id'=>$user_id,
            'post'=>$post
        ]);

        return redirect('/top');
    }
}
