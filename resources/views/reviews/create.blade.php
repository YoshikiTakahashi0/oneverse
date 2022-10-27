@extends('layouts.app')

@section("head")
<link rel="stylesheet" href="{{secure_asset('css/rating.css') }}">

@endsection

@section('content')
<h1>レビュー投稿</h1>
<form action="/reviews" method= "POST">
    <h2>{{ $review->post_id }}</h2>
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
            <input type="hidden" name="review[post_id]" value="{{ $review->post_id }}"/>
        </div>
        <div class="body">
            <h2>コメント</h2>
            <textarea name="review[body]">{{ old("review.body") }}</textarea>
            <p class="body__error" style="color:red">{{ $errors->first('review.body') }}</p>
        </div>
    </div>
    <input type="submit" value="投稿">
    <div class="footer">
    </div>
</form>
@endsection