<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
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
        
        $query = Post::query();
        $query->where('user_id', $user->id);
        $posts = $query->orderBy('plays', 'desc')->paginate(10);
        
        return view('users/mypage')->with(['user' => $user, 'posts' => $posts]);
    }
    
    public function edit(User $user)
    {
        return view('users/edit')->with(['user' => $user]);
    }
    
    public function update(User $user,UserRequest $request)
    {
        // 基本情報処理
        if(isset($request['user']))
        {
            $input = $request['user'];
            $user->fill($input)->save();  
        }     
        
        return redirect('/mypage/'. $user->id);
    }
    
    public function editImage(User $user)
    {
        return view('users/edit_image')->with(['user' => $user]);
    }
    
    public function updateImage(User $user, UserRequest $request)
    {
        // 変更前の画像をCloudinary上から削除
        if(isset($user->image_public_id))
        {
            Cloudinary::destroy($user->image_public_id);
        }
        
        // 変更後の画像保存処理
        $image = $request->file('image');
        $user->image = Cloudinary::upload($image->getRealPath())->getSecurePath();
        // 画像のPublicIdを取得
        $imagePublicId = Cloudinary::getPublicId();
        $user->image_public_id = $imagePublicId;
        
        $user->save(); 

        return redirect('/mypage/'. $user->id);
    }
    
    public function rank()
    {
        $users = User::withCount([
            'posts AS total_plays' => function($query){
                $query->select(DB::raw("SUM(plays) as plays_sum"));
                }
            ])->orderBy('total_plays', 'desc')->paginate(10);
            
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
