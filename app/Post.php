<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

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
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'music',
        'image',
        'title',
        'body',
    ];
}
