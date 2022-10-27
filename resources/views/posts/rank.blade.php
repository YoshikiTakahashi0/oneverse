@extends('layouts.app')

@section('content')
<h1>ランキング</h1>
<div class='plays'>
    <div class='posts'>
        @foreach ($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <p class='plays'>再生数{{ $post->plays }}回</p>
                <p class='image'><img width="70" height="70" src="{{ $post->image }}"></p>
                <p class='body'>{{ $post->body }}</p>
            </div>
        @endforeach
    </div>
</div>
<div class='paginate'>
    {{ $posts->links() }}
</div>
@endsection