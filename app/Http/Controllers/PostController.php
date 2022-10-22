<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Http\Requests\PostRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
         return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        // 再生数管理
        $plays = $post->plays;
        $post->plays = ++$plays;
        $post->save();
        
        return view('posts/show')->with(['post' => $post]);
    }

    public function create(Tag $tag)
    {
        return view('posts/create')->with(['tags' =>Tag::get()]);
    }
    
    public function store(Post $post, PostRequest $request)
    {
        // musicの保存処理
        $music = $request->file('music');
        // アップロードされたファイルの絶対パスを取得
        $post->music = Cloudinary::uploadVideo($music->getRealPath())->getSecurePath();
        
        // imageの保存処理
        if($request->file('image'))
        {
        $image = $request->file('image');
        $post->image = Cloudinary::upload($image->getRealPath())->getSecurePath();
        }
        
        //tag_id保存処理
        if(isset($request->tag_id))
        {
            $post->tag_id = $request->tag_id;
        }
        
        $post->user_id = Auth::id();
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
}
?>