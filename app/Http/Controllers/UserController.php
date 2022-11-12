<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserImageRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cloudinary;


class UserController extends Controller
{
    public function mypage(User $user)
    {
        $id = Auth::id();
        $user = $user->find($id);
        
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
    
    public function updateImage(User $user, UserImageRequest $request)
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
        // userをpostsが持つ合計rating順に
        $users = DB::table('posts')
                    ->rightJoin('reviews', 'posts.id', '=', 'reviews.post_id')
                    // ->crossJoin('users', 'posts.user_id', '=', 'users.id')
                    ->join('users', 'posts.user_id', '=', 'users.id')
                    ->groupBy('posts.user_id')
                    ->groupBy('users.name')
                    ->groupBy('users.image')
                    ->select('posts.user_id as id', 'users.name', 'users.image', DB::raw('sum(reviews.rating) as rating'))
                    ->orderBy('rating', 'desc')->paginate(10);
                    
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
