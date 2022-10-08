@extends('layouts.app')

@section("head")

@section('content')
<h1>投稿一覧</h1>
<div class='posts'>
    @foreach ($posts as $post)
        <div class='post'>
            <p class='music'><img src="{{ $post->music}}" alt=""></p>
            <h2 class='title'>{{ $post->Title }}</h2>
            <p class='body'>{{ $post->Body }}</p>
        </div>
    @endforeach
</div>
<div class='paginate'>
    {{ $posts->links() }}
</div>
@endsection