<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Postに対するリレーション
    public function posts()
    {
        //1つのTagを複数のPostが持つ
        return $this->hasMany('App\Post');
    }
    
     public function getPaginateByLimit(int $limit_count = 20)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
