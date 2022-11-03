@extends('layouts.app')

@section('content')
<h1>ユーザーページ</h1>
<div class="main">
    <div class="headline">
        <h2 class="name">{{ $user->name }}</h2>
        <p class="image"><img width="70" height="70" src="{{ $user->image }}"></p>
        @if(Auth::check())
            @if(!(Auth::user() == $user))
                @if($user->followers()->where('id', Auth::id())->exists())
                    <a href="/users/{{ $user->id }}/unfollow">フォロー解除</a>
                @else
                    <a href="/users/{{ $user->id }}/follow">フォローする</a>
                @endif
            @endif
        @endif
    </div>
    <div class="follow">
        <p class="follows">フォロー{{ $user->getFollowCount() }}</p>
        <p class="followers">フォロワー{{ $user->getFollowerCount() }}</p>
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