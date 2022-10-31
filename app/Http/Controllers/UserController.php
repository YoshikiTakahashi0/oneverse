<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cloudinary;


class UserController extends Controller
{
    public function mypage(User $user)
    {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        
        return view('users/mypage')->with(['user' => $user]);
    }
    
    
    
    public function edit(User $user)
    {
        return view('users/edit')->with(['user' => $user]);
    }
    
    public function update(UserRequest $request, User $user)
    {
        dd($request);
        
        // imageの保存処理
        if($request->file('image'))
        {
        $image = $request->file('image');
        $user->image = Cloudinary::upload($image->getRealPath())->getSecurePath();
        }
        
        $input = $request['user'];
        $user->fill($input)->save();
        
        return redirect('/mypage/'. $user->id);
    }
    
    public function rank()
    {
        $users = User::withCount([
            'reviews AS total_rating' => function($query){
                $query->select(DB::raw("SUM(rating) as rating_sum"));
                }
            ])->orderBy('total_rating', 'desc')->paginate(10);
            
        return view('users/rank')->with(['users' => $users]);
    }
    
    public function show(User $user)
    {
        $query = Post::query();
        $query->where('user_id', $user->id);
        $posts = $query->orderBy('plays', 'desc')->paginate(10);
        
        return view('users/show')->with(['user' => $user, 'posts' => $posts]);
    }
    
}
