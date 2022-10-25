<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class Post extends Model
{
    //Commentに対するリレーション
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
    
    //Userに対するリレーション
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    //Tagに対するリレーション
    public function tag()
    {
        //Postは1つのTagを持つ
        return $this->belongsTo('App\Tag');
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'music',
        'image',
        'title',
        'body',
        'plays',
        'tag_id',
    ];
}
