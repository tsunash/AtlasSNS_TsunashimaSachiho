<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Follow extends Model
{
    protected $fillable=[
        'following_id','followed_id'
    ];

    protected $table='follows';



}
