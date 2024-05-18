<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\Post;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){

        $follows = Auth::user()->follows()->get();
        $follows_id = Auth::user()->follows()->pluck('followed_id');
        // dd($follows_id);
        $follows_posts = Post::with('user')->whereIn('user_id',$follows_id)->orderBy('created_at','desc')->get();
        // dd($follows_posts);
        return view('follows.followList',['follows'=>$follows,'follows_posts'=>$follows_posts]);
    }

    public function followerList(){
        $followed = Follow::users()->followed_id();
                dd($followed);

        return view('follows.followerList');
    }

    public function follow(Request $request){

        $following_id = Auth::id();
        $followed_id = $request->get('followed_id');

        Follow::create([
            'following_id'=>$following_id,
            'followed_id'=>$followed_id
        ]);

        return redirect('/search');

    }

    public function remove(Request $request){

        $followed_id = $request->get('followed_id');
        Follow::where('followed_id',$followed_id)->delete();

        return redirect('/search');
    }


}
