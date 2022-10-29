@extends('layouts.app')

@section("head")
<link rel="stylesheet" href="{{secure_asset('css/rating.css') }}">

@section('content')
<h1 class="title">
    {{ $post->title }}
</h1>
<div class="post">
    <p class='image'><img width="70" height="70" src="{{ $post->image }}"></p>
    <p class='music'><video controls width="300" height="300" src="{{ $post->music }}"></p>
    <p class='body'>{{ $post->body }}</p>
    <p class='tag'>
       <a href='/tags/{{ $post->tag->id }}'>{{ $post->tag->name }}</a>
    </p>
    <p class='plays'>再生{{ $post->plays }}回</p>
</div>
<div class="reviews">
    @if(Auth::check())
    @if(!($post->wroteReview(Auth::user()) || (Auth::user() == $post->user)))
        <h3>レビュー投稿</h3>
        <form action="/reviews" method= "POST">
            @csrf
            <div class="rating">
                <div class="rate-form">
                    <input id="star5" type="radio" name="rating" value="5">
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="rating" value="4">
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="rating" value="3">
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="rating" value="2">
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="rating" value="1">
                    <label for="star1">★</label>
                    <p class="rating__error" style="color:red">{{ $errors->first('rating') }}</p>
                </div>
                <div class="post_id">
                    <input type="hidden" name="review[post_id]" value="{{ $post->id }}"/>
                </div>
                <div class="body">
                    <h4>コメント</h4>
                    <textarea name="review[body]">{{ old("review.body") }}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
                </div>
            </div>
            <input type="submit" value="投稿">
        </form>
    @endif
    @endif
    <div class="show">
        @foreach ($reviews as $review)
            <p class="rating">{{ $review->rating }}</p>
            <p class="body">{{ $review->body }}</p>
            <p class="user">{{ $review->user->name }}</p>
        @endforeach
    </div>
    <div class="pagenate">
        {{ $reviews->links() }}
    </div>
</div>
<div class="footer">
    <a href='/posts/index'>新着へ</a>
</div>
<div class="Contributor">
</div>
@endsection