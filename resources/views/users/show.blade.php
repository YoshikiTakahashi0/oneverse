@extends('layouts.app')

@section('content')
<h1>Mypage</h1>
<div class="main">
    <div class="headline">
        <h2 class="name">{{ $user->name }}</h2>
        <p class="image"><img width="70" height="70" src="{{ $user->image }}"></p>
    </div>
    <div class="follow">
        <p class="follows">フォロー</p>
        <p class="followers">フォロワー</p>
    </div>
</div>
<div class="posts">
    @foreach ($posts as $post)
        <div class='post'>
            <h2 class='title'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <p class='image'><img width="70" height="70" src="{{ $post->image }}"></p>
            <p class='body'>{{ $post->body }}</p>
        </div>
    @endforeach
</div>
<div class="footer">
    <a href='{{ url()->previous() }}'>戻る</a>
</div>
@endsection