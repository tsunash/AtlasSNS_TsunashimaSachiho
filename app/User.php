<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Follow;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        $this->hasMany('App\Post');
    }


    public function follows(){
    return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }
    public function followUsers(){
    return $this->belongsToMany('App\User','follows','followed_id','following_id');
    }


    public function isFollowing(){
    // $is_following = Auth::id()->follow()->followed_id->get();
    return $this->follows()->where('followed_id',$user->id())->exist();
    }


}
