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
        $rankposts = Post::orderBy('plays', 'desc')->take(5)->get();
        $newposts = Post::orderBy('created_at', 'desc')->take(5)->get();

        return view('home')->with(['rankposts' =>$rankposts, 'newposts' => $newposts]);
    }
    
    public function about()
    {
        return view('about');
    }
    
}
?>
