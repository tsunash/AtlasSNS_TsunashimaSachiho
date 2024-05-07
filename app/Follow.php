<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Follow;

class Follow extends Model
{
    protected $fillable=[
        'following_id','followed_id'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'follows','following_id','followed_id');
        return $this->belongsToMany(User::class,'follows','followed_id','following_id');
    }

}
