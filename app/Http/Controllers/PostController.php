<?php

namespace App\Http\Controllers;

use App\Post;
use App\Review;
use App\Tag;
use App\User;
use App\Http\Requests\PostRequest;
use Cloudinary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        
        $reviews = $post->reviews()->paginate(5);
        
        return view('posts/show')->with(['post' => $post, 'reviews' => $reviews]);
    }

    public function create(Tag $tag)
    {
        return view('posts/create')->with(['tags' =>Tag::get()]);
    }
    
    public function store(Post $post, PostRequest $request)
    {
        // musicの保存処理
        $video = $request->file('music');
        // アップロードされたファイルの絶対パスを取得
        $post->music = Cloudinary::uploadVideo($video->getRealPath())->getSecurePath();
        // 動画のPublicIdを取得
        $videoPublicId = Cloudinary::getPublicId();
        $post->music_public_id = $videoPublicId;

        // imageの保存処理
        if($request->file('image'))
        {
        $image = $request->file('image');
        $post->image = Cloudinary::upload($image->getRealPath())->getSecurePath();
        // 画像のPublicIdを取得
        $imagePublicId = Cloudinary::getPublicId();
        $post->image_public_id = $imagePublicId;
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
    
    public function destroy(Post $post)
    {
        
        // 動画ファイルの削除
        Cloudinary::destroy($post->music_public_id);

        // 画像ファイルの削除
        if(isset($post->image_public_id))
        {
            Cloudinary::destroy($post->image_public_id);
        }
        
        $post->delete();
        return redirect('posts/index');
    }
    
    public function rank()
    {
        $posts = Post::orderByRaw('plays is null asc')->orderBy('plays', 'desc')->paginate(10);
        return view('posts/rank_plays')->with(['posts' => $posts]);
    }
    
    public function rank_reviews()
    {
        $posts = Post::withCount([
            'reviews AS total_rating' => function($query){
                $query->select(DB::raw("SUM(rating) as rating_sum"));
                }
            ])->orderBy('total_rating', 'asc')->paginate(10);
            
        return view('posts/rank_reviews')->with(['posts' => $posts]);
    }
    
    public function timeline()
    {
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->orderBy('created_at', 'desc')->paginate(10);
        
        return view('posts/timeline')->with(['posts' => $posts]);
    }
}
?>