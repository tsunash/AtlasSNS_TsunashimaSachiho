<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    public function index(){

        $posts = Post::whereIn('user_id',Auth::user()->follows()->pluck('followed_id'))->orWhere('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
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

    public function postEdit(Request $request){

        $edit_id = $request->input('edit-id');
        $edit_post = $request->input('editpost');

        $request->validate([
            'editpost' => 'required|min:1|max:150'
        ]);

            Post::where('id',$edit_id)->update([
                'post' => $edit_post
            ]);

            return redirect('/top');

    }

    public function delete(Int $id){
        Post::where('id',$id)->delete();
        return redirect('/top');
    }

}
