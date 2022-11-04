@extends('layouts.app')

@section("head")

@section('content')
<h1>新着</h1>
<div class='posts'>
    @foreach ($posts as $post)
        <div class='post card'>
            <h2 class='title'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <p class='image'><img width="70" height="70" src="{{ $post->image }}"></p>
            <p class='body'>{{ $post->body }}</p>
        </div>
    @endforeach
</div>
<div class='paginate'>
    {{ $posts->links() }}
</div>
@endsection