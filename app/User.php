<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    //postに対するリレーション
    public function Posts()
    {
        return $this->hasMany('App\Post');
    }
    
    //commentに対するリレーション
    public function Comments()
    {
        return $this->hasMany('App\Commnet');
    }
    
    //userに対するリレーション。フォロワー
    public function followers()
    {
        return $this->belongsToMany(self::class, "followers", "followed_id", "following_id");
    }
    
    //userに対するリレーション。フォロー.
    public function follows()
    {
        return this->belongsToMany(self::class, "followers", "following_id", "followed_id");
    }
}
