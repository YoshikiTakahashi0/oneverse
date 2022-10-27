<?php

namespace App\Http\Controllers;

use App\Post;
use App\Review;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function create(Review $review, $post)
    {
        $review->post_id = $post;
        return view('reviews/create')->with(['review' => $review]);
    }
    
    public function store(Review $review, ReviewRequest $request)
    {
        $review->user_id = Auth::id();
        $input = $request['review'];
        $review->rating = $request->rating;
        $review->fill($input)->save();
        
        return redirect('/posts/' . $review->post->id);
    }
}
