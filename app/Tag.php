<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Postに対するリレーション
    public function posts()
    {
        //1つのTagを複数のPostが持つ
        return $this->belongsToMany('App\Post');
    }
}
