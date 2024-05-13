<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){

        $follows = Follow::where('following_id',Auth::id())->get();

        return view('follows.followList',['follows'=>$follows]);
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
