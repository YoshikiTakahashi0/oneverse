<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Commentに対するリレーション
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    //Userに対するリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    //Tagに対するリレーション
    public function tags()
    {
        //Postは複数のTagを持つ
        return $this->belongToMany('App\Tag');
    }
}
