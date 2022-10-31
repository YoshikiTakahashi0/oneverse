<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use Illuminate\Support\Facades\DB;


class TagController extends Controller
{
    
    public function index(Tag $tag)
    {
        return view('tags/index')->with(['tags' => $tag->getPaginateByLimit()]);
    }
    
    public function posts_sort(Tag $tag)
    {
        $query = Post::query();
        $query->where('tag_id', $tag->id);
        $posts = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('tags/posts_sort')->with(['tag' => $tag, 'posts' => $posts]);
    }
    
     public function rank_posts(Tag $tag)
    {
        $query = Post::query();
        $query->where('tag_id', $tag->id);
        $posts = $query->orderBy('plays', 'desc')->paginate(10);
        
        return view('tags/rank_posts')->with(['tag' => $tag, 'posts' => $posts]);
    }
}
