<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;

class TagController extends Controller
{
    
    public function index(Tag $tag)
    {
        return view('tags/index')->with(['tags' => $tag->getPaginateByLimit()]);
    }
    
    public function posts_sort(Tag $tag)
    {
        return view('tags/posts_sort')->with(['tag' => $tag]);
    }
}
