<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
         return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function store(Request $request, Post $post)
    {

        //musicの保存処理
        $music = $request->file('music');
        
        if(isset($music)){
            
            //  アップロードされたファイルの絶対パスを取得
            $post->music = Cloudinary::uploadVideo($music->getRealPath())->getSecurePath();
        }
        
        $post->user_id = Auth::id();
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
?>