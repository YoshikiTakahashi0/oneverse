<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     //Userに対するリレーション
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    
    //Postに対するリレーション
    public function Post()
    {
        return $this->belongsTo('App\Post');
    }
    
    protected $fillable = [
        'body',
        'rating',
        'post_id',
    ];
}
