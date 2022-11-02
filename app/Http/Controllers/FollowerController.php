<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;
use Illuminate\Support\Facades\Auth;


class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $user->followers()->attach(Auth::id());

        return redirect('/users/'.$user->id);
    }
    
    public function unfollow(User $user)
    {        
        $user->followers()->detach(Auth::id());

        return redirect('/users/'.$user->id);
    }
}
