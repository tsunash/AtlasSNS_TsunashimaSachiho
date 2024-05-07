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

    // public function follows(){
        // return $this->belongsToMany(Follow::class,'follows','following_id','followed_id');
        // return $this->belongsToMany(Follow::class,'follows','followed_id','following_id');

        // return $this->belongsToMany(Follow::class,'follows','id','follower_id');
        // return $this->belongsToMany(Follow::class,'follows','id','followed_id');
    // }
}
