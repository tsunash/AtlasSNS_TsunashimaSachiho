<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    public function index(){

        $posts = Post::orderBy('created_at','desc')->get();
        return view('posts.index',['posts'=>$posts]);

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

    public function edit(Request $request){

        $id = $request->input('id');
        $post = $request->input('post');

        $request->validate([
            'post' => 'required|min:1|max:150'
        ]);

        Post::where('id',$id)->update([
            'post' => $post
        ]);

        return redirect('/top');
    }

}
