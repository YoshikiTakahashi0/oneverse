<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use home;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('plays', 'desc')->take(5)->get();

        return view('home')->with(['posts' =>$posts]);
    }
    
    public function about()
    {
        return view('about');
    }
    
}
?>
