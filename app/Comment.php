<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //Userに対するリレーション
    public function User()
    {
        return $this->belongTo('App\User');
    }
    
    //Postに対するリレーション
    public function Post()
    {
        return $this->belongTo('App\Post');
    }
}
