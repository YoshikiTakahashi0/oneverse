@extends('layouts.app')

@section("head")

@section('content')
<h1>投稿一覧</h1>
<div class='posts'>
    @foreach ($posts as $post)
        <div class='post'>
            <h2 class='title'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <p class='image'><img src="{{ $post->image }}"></p>
            <p class='music'><video controls width="200" height="200" src="{{ $post->music }}"></p>
            <p class='body'>{{ $post->body }}</p>
        </div>
    @endforeach
</div>
<div class='paginate'>
    {{ $posts->links() }}
</div>
@endsection