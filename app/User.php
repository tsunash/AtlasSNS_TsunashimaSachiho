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
        'username', 'mail', 'password', 'bio', 'images',
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


    public function isFollowing($user_id){
    return (bool) $this->follows()->where('followed_id',$user_id)->first();
    }


}
