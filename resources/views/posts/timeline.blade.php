@extends('layouts.app')

@section('content')
<h1>タイムライン</h1>
<div class='posts'>
    @foreach ($posts as $post)
        <div class="user">
            <p class="image"><img width="20" height="20" src="{{ $post->user->image }}"></p>
            <p class='name'>
                <a href='/users/{{ $post->user->id }}'>{{ $post->user->name }}</a>
            </p>
        </div>
        <div class='post'>
            <h2 class='title'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <p class='image'><img width="70" height="70" src="{{ $post->image }}"></p>
            <p class='body'>{{ $post->body }}</p>
            <p class='created_at'>{{ $post->created_at }}</p>
        </div>
    @endforeach
</div>
<div class='paginate'>
    {{ $posts->links() }}
</div>
@endsection