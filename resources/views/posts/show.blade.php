@extends('layouts.app')

@section("head")
<link rel="stylesheet" href="{{secure_asset('css/rating.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row col">
        <h1 class="title">
            {{ $post->title }}
        </h1>
    </div>
    <div class="row g-0">
        <div class="col-md-6">
            <p class='music'><video controls src="{{ $post->music }}" class="img-fluid rounded float-start border img-thumbnail"></p>
        </div>
        <div class="col-md-6">
            <div class="ml-5">
                <div class="contributor row">
                    <p class='image col-1'><img width="30" height="30" src="{{ $post->user->image }}"></p>
                    <p class='name mx-2 col-3'>
                        <a href='/users/{{ $post->user->id }}' style="text-decoration:none;">{{ $post->user->name }}</a>
                    </p>
                </div>
                <div class="post">
                    <p class='image'><img width="70" height="70" src="{{ $post->image }}"></p>
                    <p class='body'>{{ $post->body }}</p>
                    <p class='tag'>
                       <a href='/tags/{{ $post->tag->id }}' style="text-decoration:none;">ジャンル：{{ $post->tag->name }}</a>
                    </p>
                    <p class='plays'>再生{{ $post->plays }}回</p>
                    <p class='created_at'>{{ $post->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="my-2 ml-3">
            <div class="contributor">
                <div class="destroy">
                    @if(Auth::check())
                        @if(Auth::user() == $post->user)
                            <form action='/posts/destroy/{{ $post->id }}' method="post">
                                @csrf
                                @method('DELETE')
                                <button class="delete">投稿を削除</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="my-2">
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
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="my-5">
            <h2>レビュー</h2>
            <div class="row col">
                <div class="show card">
                @foreach ($reviews as $review)
                    <div class="card" style="height: 180px">
                        <div class="row g-0">
                            <div class="col-4">
                                <p class="rating">☆{{ $review->rating }}</p>
                                <p class="user">{{ $review->user->name }}</p>
                            </div>
                            <div class="col-8">
                                <p class="body">{{ $review->body }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="pagenate">
        {{ $reviews->links() }}
    </div>
    <div class="footer">
        <a href='/posts/index' style="text-decoration:none;">新着へ</a>
    </div>
</div>
@endsection