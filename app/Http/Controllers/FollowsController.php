<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){

        $following = Follow::where('following_id','=',Auth::id())->get();
        dd($following);

        return view('follows.followList');
    }
    public function followerList(){
        // $followed =Follow::users()->followed_id();
        //         dd($followed);

        return view('follows.followerList');
    }

    public function follow(Request $request){

        $following_id = Auth::id()->get();
        $followed_id = $request->input('followed_id');

        Follow::insert(['following_id'=>$following_id],['followed_id'=>$followed_id]);

        return redirect('/search');

    }

}
